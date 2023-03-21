/*
 *
 * Wijmo Library 3.20132.8
 * http://wijmo.com/
 *
 * Copyright(c) GrapeCity, Inc.  All rights reserved.
 * 
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * licensing@wijmo.com
 * http://wijmo.com/widgets/license/
 *
 */
var __extends = this.__extends || function (d, b) {
    function __() { this.constructor = d; }
    __.prototype = b.prototype;
    d.prototype = new __();
};
var wijmo;
(function (wijmo) {
    (function (ng) {
        // declare the Node variable explicitly because IE8 and older versions do not expose it.
        var Node;
        (function (Node) {
            Node._map = [];
            Node.ELEMENT_NODE = 1;
            Node.ATTRIBUTE_NODE = 2;
            Node.TEXT_NODE = 3;
            Node.CDATA_SECTION_NODE = 4;
            Node.ENTITY_REFERENCE_NODE = 5;
            Node.ENTITY_NODE = 6;
            Node.PROCESSING_INSTRUCTION_NODE = 7;
            Node.COMMENT_NODE = 8;
            Node.DOCUMENT_NODE = 9;
            Node.DOCUMENT_TYPE_NODE = 10;
            Node.DOCUMENT_FRAGMENT_NODE = 11;
            Node.NOTATION_NODE = 12;
        })(Node || (Node = {}));
        function getTypeDefFromExample(value) {
            if(value == null) {
                return {
                };
            }
            var meta = {
                type: angular.isArray(value) ? "array" : typeof value
            };
            switch(meta.type) {
                case "object":
                    meta.properties = {
                    };
                    if(value) {
                        $.each(value, function (key, propValue) {
                            meta.properties[key] = getTypeDefFromExample(propValue);
                        });
                    }
                    break;
                case "array":
                    meta.elementType = getTypeDefFromExample(value[0]);
                    break;
            }
            return meta;
        }
        var propPath;
        (function (propPath) {
            function partition(path) {
                if(typeof path !== "string") {
                    return path;
                }
                var parts = path.split(/[\.\[\]]/g);
                for(var i = parts.length - 1; i >= 0; i--) {
                    if(!parts[i]) {
                        parts.splice(i, 1);
                    }
                }
                return parts;
            }
            propPath.partition = partition;
            function get(obj, path) {
                var parts = partition(path);
                for(var i = 0; obj && i < parts.length; i++) {
                    obj = obj[parts[i]];
                }
                return obj;
            }
            propPath.get = get;
            function set(obj, path, value) {
                var parts = partition(path);
                var last = parts.pop();
                obj = get(obj, parts);
                if(obj) {
                    obj[last] = value;
                }
            }
            propPath.set = set;
        })(propPath || (propPath = {}));
        var ngTools;
        (function (ngTools) {
            function onDigest(scope, fn) {
                var removeWatcher;
                var removeWatcher = scope.$watch("any", function () {
                    if(removeWatcher) {
                        removeWatcher();
                        removeWatcher = null;
                    }
                    fn();
                });
            }
            ngTools.onDigest = onDigest;
        })(ngTools || (ngTools = {}));
        function safeApply(scope, data) {
            var phase = scope.$root.$$phase;
            if(phase !== '$apply' && phase !== '$digest') {
                scope.$apply(data);
            }
        }
        var Subelement = (function () {
            function Subelement(element, link) {
                this.element = element;
                this.link = link;
            }
            return Subelement;
        })();        
        var TextEvalEntry = (function () {
            function TextEvalEntry(expr) {
                this.expr = expr;
            }
            return TextEvalEntry;
        })();        
        var TextEval = (function () {
            function TextEval(text, scope, onChange) {
                this.text = text;
                this.scope = scope;
                this.onChange = onChange;
                var _this = this;
                this.entries = {
                };
                var match;
                while(match = TextEval.exprRegex.exec(text)) {
                    var expr = match[1];
                    if(this.entries[expr]) {
                        continue;
                    }
                    this.entries[expr] = new TextEvalEntry(expr);
                }
                angular.forEach(this.entries, function (e) {
                    var assigned = false;
                    scope.$watch(e.expr, function (value) {
                        assigned = true;
                        if(e.value == value) {
                            return;
                        }
                        e.value = value;
                        _this.update();
                    });
                    if(!assigned) {
                        e.value = scope.$eval(expr);
                    }
                });
                this.update();
            }
            TextEval.exprRegex = /{{([^}]+)}}/g;
            TextEval.prototype.update = function () {
                var _this = this;
                var result = this.text.replace(TextEval.exprRegex, function (m, name) {
                    var entry = _this.entries[name];
                    return entry && entry.value;
                });
                if(result == this.result) {
                    return;
                }
                this.result = result;
                if(this.onChange) {
                    this.onChange(result);
                }
            };
            return TextEval;
        })();        
        function parsePrimitiveValue(text, type) {
            // if the type is a number or boolean, then parse it.
            // if it is not an object or the node is not an element, return the text
            switch(type.toLowerCase()) {
                case "boolean":
                    return text.toLowerCase() === "true";
                case "number":
                    return parseFloat(text);
                case "date":
                case "datetime":
                    return Globalize.parseDate(text);
                default:
                    return null;
            }
        }
        var Markup = (function () {
            function Markup(node, typeDef, selector, services) {
                this.selector = selector;
                this.services = services;
                this.innerMarkupTemplate = "<div/>";
                this.bindings = [];
                this.subElements = [];
                var $node = $(node);
                this.parseInnerMarkup($node);
                this.parseOptions($node, typeDef);
            }
            Markup.prototype.moveContents = function (from, to) {
                function moveAttr(name) {
                    var value = from.attr(name);
                    if(value) {
                        to.attr(name, value);
                        from.removeAttr(name);
                    }
                }
                from.children().each(function (_, child) {
                    return to.append(child);
                });
                if(!to.children().length) {
                    to.text(from.text());
                }
                moveAttr("id");
                moveAttr("style");
                moveAttr("class");
                return to;
            };
            Markup.prototype.extractSubelements = function (element) {
                if(!this.selector) {
                    return;
                }
                var e = $(element);
                if(e.is(this.selector)) {
                    var clone = element.clone();
                    var converted = this.moveContents(element, $(this.innerMarkupTemplate));
                    this.subElements.push(new Subelement(clone, this.services.$compile(converted)));
                    e.empty();
                }
            };
            Markup.allowedInnerHtmlSelector = "div, span, table, ul, ol, p, li, h1, h2, h3, h4";
            Markup.prototype.parseInnerMarkup = function (element) {
                var _this = this;
                var addInnerNode = function ($node) {
                    var clone = $node.clone();
                    _this.subElements.push(new Subelement(clone, _this.services.$compile($node)));
                    $node.remove();
                };
                element.children(Markup.allowedInnerHtmlSelector).each(function (_, e) {
                    return addInnerNode($(e));
                });
                var container = element.children("inner-markup");
                if(container.length > 0) {
                    container.children().each(function (_, e) {
                        return addInnerNode($(e));
                    });
                    container.remove();
                }
            };
            Markup.prototype.apply = function (scope, parentElement) {
                angular.forEach(this.subElements, function (se) {
                    return se.link(scope.$parent, function (el) {
                        return parentElement.append(el);
                    });
                });
            };
            Markup.prototype.getNameMap = // get camelCase name -> lowercase property name mapping
            function (obj) {
                var map = {
                }, key;
                for(key in obj) {
                    map[key.toLowerCase()] = key;
                }
                return map;
            };
            Markup.prototype.parseOptions = function ($node, typeDef) {
                this.options = this.parse($node, typeDef, "");
            };
            Markup.prototype.parse = function ($node, typeDef, path) {
                var _this = this;
                var readNode = function (node) {
                    var $node = $(node), value, name, propPath;
                    switch(node.nodeType) {
                        case Node.ATTRIBUTE_NODE:
                            value = $node.val();
                            break;
                        case Node.ELEMENT_NODE:
                            value = $node.text();
                            break;
                        default:
                            return;
                    }
                    // restore the original property name casing if possible
                    name = node.nodeName || node.name;
                    name = name.toLowerCase();
                    if(map[name]) {
                        name = map[name];
                    } else if(name.match(/-/)) {
                        var parts = name.split("-");
                        name = parts.shift();
                        angular.forEach(parts, function (p) {
                            return name += p.charAt(0).toUpperCase() + p.substring(1);
                        });
                    }
                    var metadata = properties && properties[name];
                    if(!hasChildElements(node) && value && value.match(/{{/)) {
                        toRemove.push(node);
                        _this.bindings.push({
                            typeDef: metadata,
                            path: (path && path + ".") + name,
                            dynamicText: value
                        });
                        return;
                    }
                    if(node.nodeType === Node.ELEMENT_NODE && array) {
                        // then push the sub-element
                        array.push(_this.parse($node, typeDef && typeDef.elementType, path + "[" + array.length + "]"));
                    } else {
                        if(value.match(/^[^\d]/) && node.nodeType === Node.ATTRIBUTE_NODE && metadata && (metadata.changeEvent || metadata.twoWayBinding)) {
                            toRemove.push(node);
                            _this.bindings.push({
                                path: (path && path + ".") + name,
                                expression: value
                            });
                        } else {
                            obj[name] = _this.parse($node, metadata, (path && path + ".") + name);
                        }
                    }
                };
                var node = $node[0], text = node.nodeType === Node.TEXT_NODE ? (node).wholeText : (node).value, isArray = typeDef && typeDef.type === "array", properties = typeDef && typeDef.properties, map = // we need this lowercase name map because HTML IS NOT CASE-SENSITIVE! Chris said that.
                properties && this.getNameMap(properties) || {
                }, toRemove = [], obj, array, primitiveTypeRequested;
                if(node.nodeType === Node.ELEMENT_NODE) {
                    this.extractSubelements($node);
                }
                var primitiveValue = typeDef && typeDef.type ? parsePrimitiveValue(text, typeDef && typeDef.type) : null;
                if(primitiveValue !== null) {
                    return primitiveValue;
                } else if(primitiveValue == null) {
                    primitiveTypeRequested = typeDef && typeDef.type && typeDef.type !== "object" && typeDef.type !== "array";
                    if(primitiveTypeRequested || node.nodeType !== Node.ELEMENT_NODE) {
                        return text;
                    }
                }
                // parse a DOM element to an object/array
                if(isArray) {
                    array = [];
                } else {
                    obj = {
                    };
                }
                // read attributes
                angular.forEach(node.attributes, readNode);
                angular.forEach(node.childNodes, readNode);
                $.each(toRemove, function (_, node) {
                    if(node.nodeType === Node.ATTRIBUTE_NODE) {
                        $(node.ownerElement).removeAttr(node.name);
                    } else {
                        $(node).remove();
                    }
                });
                return obj || array;
            };
            return Markup;
        })();        
        var definitions;
        (function (definitions) {
            var DirectiveBase = (function () {
                function DirectiveBase(widgetName, namespace, clazz, services) {
                    this.widgetName = widgetName;
                    this.namespace = namespace;
                    this.services = services;
                    this.internalEventPrefix = "wijmo-angular";
                    this.fullWidgetName = namespace + widgetName.charAt(0).toUpperCase() + widgetName.substr(1);
                    this.wijMetadata = DirectiveBase.mergeMetadata(widgetName, clazz.prototype.options);
                    this.eventPrefix = clazz.prototype.widgetEventPrefix || widgetName;
                }
                DirectiveBase.mergeMetadata = function mergeMetadata(widgetName, options) {
                    var fromOptions = {
                        properties: getTypeDefFromExample(options).properties
                    }, result = $.extend({
                    }, fromOptions, widgetMetadata["base"]), inheritanceStack = [], parentName = widgetName;
                    do {
                        inheritanceStack.unshift(parentName);
                        parentName = widgetMetadata[parentName] && widgetMetadata[parentName].inherits;
                    }while(parentName);
                    angular.forEach(inheritanceStack, function (name) {
                        return $.extend(true, result, widgetMetadata[name]);
                    });
                    return result;
                };
                DirectiveBase.prototype.transition = function () {
                    if(Object.create) {
                        try  {
                            return Object.create(this);
                        } catch (err) {
                        }
                    }
                    var Clazz = function () {
                    };
                    Clazz.prototype = this;
                    return new Clazz();
                };
                DirectiveBase.prototype.compile = // ----- compiled state -----
                function (tElem, tAttrs, $compile) {
                    return this.transition()._compile(tElem, tAttrs, $compile);
                };
                DirectiveBase.prototype._compile = function (tElem, tAttrs, $compile) {
                    return $.proxy(this.link, this);
                };
                DirectiveBase.prototype._initWidget = function () {
                    this.widget = this.element.data(this.widgetName) || this.element.data(this.fullWidgetName);
                };
                DirectiveBase.prototype.link = function (scope, elem, attrs) {
                    var transitioned = this.transition();
                    transitioned.$scope = scope;
                    transitioned.element = elem;
                    transitioned._link(attrs);
                };
                DirectiveBase.prototype._link = function (attrs) {
                    var _this = this;
                    ngTools.onDigest(this.$scope.$parent, function () {
                        _this._createInstance(attrs);
                        _this._initWidget();
                    });
                };
                DirectiveBase.prototype._createInstance = function (attrs) {
                };
                DirectiveBase.prototype.bindToWidget = function (name, handler) {
                    var fullName = this.eventPrefix + name.toLowerCase() + "." + this.internalEventPrefix;
                    this.element.bind(fullName, handler);
                };
                return DirectiveBase;
            })();
            definitions.DirectiveBase = DirectiveBase;            
            var AttributeDirective = (function (_super) {
                __extends(AttributeDirective, _super);
                function AttributeDirective(widgetName, namespace, clazz, services) {
                                _super.call(this, widgetName, namespace, clazz, services);
                    this.delay = false;
                }
                AttributeDirective.prototype._createInstance = // ----- linked state-----
                function (attrs) {
                    var _this = this;
                    var create = function () {
                        _this.element[_this.widgetName]();
                    };
                    if(this.delay) {
                        setTimeout(create, 0);
                    } else {
                        create();
                    }
                };
                return AttributeDirective;
            })(DirectiveBase);
            definitions.AttributeDirective = AttributeDirective;            
            var ElementDirective = (function (_super) {
                __extends(ElementDirective, _super);
                function ElementDirective(widgetName, namespace, clazz, services) {
                                _super.call(this, widgetName, namespace, clazz, services);
                    this.expectedTemplate = "<div/>";
                    this.restrict = 'E';
                    // require mapping to a DOM element
                    this.replace = true;
                    this.scope = {
                    };
                    this.innerMarkupSelector = null;
                    this.scopeWatchers = {
                    };
                    this.registerEvents();
                }
                ElementDirective.prototype.registerEvents = function () {
                    var _this = this;
                    // TODO: optimize this. No need to watch for all events if handlers are not specified
                    if(!this.wijMetadata.events) {
                        return;
                    }
                    $.each(this.wijMetadata.events, function (name) {
                        _this.scope[name] = "=" + name.toLowerCase();
                        _this.scopeWatchers[name] = function (handler) {
                            this.bindToWidget(name, handler);
                        };
                    });
                };
                ElementDirective.prototype.createMarkup = function (elem, typeDef) {
                    return new Markup(elem[0], typeDef, this.innerMarkupSelector, this.services);
                };
                ElementDirective.prototype.parseMarkup = function (elem) {
                    var markup = this.createMarkup(elem, {
                        type: "object",
                        properties: this.wijMetadata.properties
                    });
                    markup.options.dataSource = [];
                    return markup;
                };
                ElementDirective.prototype._compile = // ---- compiled state-----
                function (tElem, tAttrs, $compile) {
                    this.markup = this.parseMarkup(tElem);
                    return _super.prototype._compile.call(this, tElem, tAttrs, $compile);
                };
                ElementDirective.prototype._link = // ----- linked state -----
                function (attrs) {
                    // create a widget instance
                    this.element = $(this.expectedTemplate).replaceAll(this.element);
                    this.markup.apply(this.$scope, this.element);
                    _super.prototype._link.call(this, attrs);
                };
                ElementDirective.prototype.createInstanceCore = function (options) {
                    this.element[this.widgetName](options);
                };
                ElementDirective.prototype._createInstance = function (attrs) {
                    // move style and class to the new element
                    this.element.attr({
                        style: attrs.style,
                        id: attrs.id,
                        "class": attrs["class"]
                    });
                    this.createInstanceCore(this.markup.options);
                    this._initWidget();
                    this.wireData();
                };
                ElementDirective.prototype.wireData = function () {
                    var _this = this;
                    var parentScope = this.$scope.$parent, applyingOptions = {
                    };
                    // setup directive scope watches
                    $.each(this.scopeWatchers, function (name, handler) {
                        return _this.$scope.$watch(name, $.proxy(handler, _this), true);
                    });
                    // establish two-way data binding between widget options and a view model (parent scope)
                    $.each(this.markup.bindings, function (_, binding) {
                        if(binding.dynamicText) {
                            var textEval = new TextEval(binding.dynamicText, parentScope, function (text) {
                                var value = text;
                                if(binding.typeDef && binding.typeDef.type) {
                                    value = parsePrimitiveValue(value, binding.typeDef.type) || value;
                                }
                                _this.setOption(binding.path, value);
                            });
                            return;
                        }
                        // listen to changes in the view model
                        var didAssign = false;
                        parentScope.$watch(binding.expression, function (value) {
                            if(applyingOptions[binding.path] && _this.widget.option(binding.path) === value) {
                                return;
                            }
                            _this.setOption(binding.path, value);
                            didAssign = true;
                        }, true);
                        if(!didAssign) {
                            _this.setOption(binding.path, parentScope.$eval(binding.expression));
                        }
                        // listen to changes in the widget options
                        var meta = propPath.get(_this.wijMetadata.properties, binding.path);
                        var changeEvent = meta && meta.changeEvent;
                        if(!changeEvent) {
                            changeEvent = binding.path + "Changed";
                            if(!(changeEvent in _this.widget.options)) {
                                changeEvent = null;
                            }
                        }
                        if(changeEvent) {
                            if(typeof changeEvent != "string" && changeEvent.join) {
                                changeEvent = changeEvent.join(" ");
                            }
                            _this.bindToWidget(changeEvent, function () {
                                applyingOptions[binding.path] = true;
                                try  {
                                    propPath.set(parentScope, binding.expression, _this.widget.option(binding.path));
                                    safeApply(parentScope, binding.expression);
                                }finally {
                                    applyingOptions[binding.path] = false;
                                }
                            });
                        }
                    });
                };
                ElementDirective.prototype.setOption = function (path, value) {
                    var parts = propPath.partition(path);
                    if(parts.length == 1) {
                        this.widget.option(path, value);
                    } else {
                        var optionName = parts.shift();
                        var optionValue = this.widget.option(optionName);
                        propPath.set(optionValue, parts, value);
                        this.widget.option(optionName, optionValue);
                    }
                };
                return ElementDirective;
            })(DirectiveBase);
            definitions.ElementDirective = ElementDirective;            
            var GridMarkup = (function (_super) {
                __extends(GridMarkup, _super);
                function GridMarkup() {
                    _super.apply(this, arguments);

                }
                GridMarkup.prototype.extactCellTemplate = function ($col, name) {
                    var templateContainer = $col.children(name);
                    if(templateContainer.length === 0) {
                        return null;
                    }
                    var template = templateContainer.children().clone();
                    if(template.length === 0) {
                        return null;
                    }
                    templateContainer.remove();
                    return {
                        element: template,
                        link: this.services.$compile(template)
                    };
                };
                GridMarkup.prototype.extractCellTemplates = function (node) {
                    var _this = this;
                    this.cellTemplates = this.cellTemplates || [];
                    $(node).children("columns").children().each(function (index, col) {
                        var $col = $(col);
                        var cellTemplate = _this.extactCellTemplate($col, "cellTemplate");
                        var editorTemplate = _this.extactCellTemplate($col, "editorTemplate");
                        if(cellTemplate || editorTemplate) {
                            _this.cellTemplates[index] = {
                                view: cellTemplate,
                                edit: editorTemplate
                            };
                        }
                    });
                };
                GridMarkup.prototype.parseOptions = function ($node, typeDef) {
                    this.extractCellTemplates($node);
                    _super.prototype.parseOptions.call(this, $node, typeDef);
                    this.options.data = [];
                };
                return GridMarkup;
            })(Markup);            
            var wijgrid = (function (_super) {
                __extends(wijgrid, _super);
                function wijgrid() {
                    _super.apply(this, arguments);

                    this.expectedTemplate = "<table/>";
                }
                wijgrid.prototype.createMarkup = function (elem, typeDef) {
                    return new GridMarkup(elem[0], typeDef, this.innerMarkupSelector, this.services);
                };
                wijgrid.prototype.dataOptionExression = function () {
                    var expr = null;
                    $.each(this.markup.bindings, function (_, b) {
                        if(b.path === "data") {
                            expr = b.expression;
                            return false;
                        }
                    });
                    return expr;
                };
                wijgrid.prototype.applyCellTemplates = function (scope, options) {
                    var _this = this;
                    function applyCellTemplate(index, container, template) {
                        if(index < 0) {
                            return false;
                        }
                        var items = scope.$parent.$eval(dataExpr);
                        if(!items) {
                            return false;
                        }
                        var rowScope = scope.$new();
                        rowScope.rowData = items[index];
                        template.link(rowScope, function (el) {
                            container.empty().append(el);
                        });
                        container.children().data(ngKey, true);
                        return true;
                    }
                    var columns = options.columns, dataExpr = this.dataOptionExression(), ngKey = "wijmoNg";
                    if(!dataExpr) {
                        return;
                    }
                    var hasEditTemplates = false;
                    $.each(this.markup.cellTemplates, function (index, template) {
                        if(!template) {
                            return;
                        }
                        var column = (columns[index] = columns[index] || {
                        });
                        if(template.view) {
                            var origFormatter = column.cellFormatter;
                            column.cellFormatter = function (args) {
                                return $.isFunction(origFormatter) && origFormatter(args) || applyCellTemplate(args.row.dataItemIndex, args.$container, template.view);
                            };
                        }
                        if(template.edit) {
                            hasEditTemplates = true;
                        }
                    });
                    if(hasEditTemplates) {
                        var origBeforeCellEdit = options.beforeCellEdit;
                        var origAfterCellEdit = options.afterCellEdit;
                        options.beforeCellEdit = function (e, args) {
                            if($.isFunction(origBeforeCellEdit)) {
                                origBeforeCellEdit(args);
                                if(args.handled) {
                                    return;
                                }
                            }
                            var col = args.cell.column();
                            if(!col || col.dataIndex < 0 || col.dataIndex >= _this.markup.cellTemplates.length) {
                                return;
                            }
                            var row = args.cell.row();
                            if(!row || row.dataItemIndex < 0) {
                                return;
                            }
                            var container = args.cell.container();
                            if(!container || container.length == 0) {
                                return;
                            }
                            var template = _this.markup.cellTemplates[col.dataIndex];
                            if(!template) {
                                return;
                            }
                            if(applyCellTemplate(row.dataItemIndex, container, template.edit)) {
                                args.handled = true;
                            }
                        };
                        options.afterCellEdit = function (e, args) {
                            if($.isFunction(origAfterCellEdit)) {
                                origAfterCellEdit(args);
                                if(args.handled) {
                                    return;
                                }
                            }
                            var container = args.cell.container();
                            if(container && container.children().data(ngKey)) {
                                container.empty();
                            }
                        };
                    }
                };
                wijgrid.prototype.createInstanceCore = function (options) {
                    // apply column templates
                    options = $.extend(true, {
                    }, options);
                    this.applyCellTemplates(this.$scope, options);
                    _super.prototype.createInstanceCore.call(this, options);
                };
                return wijgrid;
            })(ElementDirective);
            definitions.wijgrid = wijgrid;            
            var wijcombobox = (function (_super) {
                __extends(wijcombobox, _super);
                function wijcombobox() {
                    _super.apply(this, arguments);

                    this.expectedTemplate = "<input/>";
                }
                return wijcombobox;
            })(ElementDirective);
            definitions.wijcombobox = wijcombobox;            
            var wijinputcore = (function (_super) {
                __extends(wijinputcore, _super);
                function wijinputcore() {
                    _super.apply(this, arguments);

                    this.expectedTemplate = "<input/>";
                }
                return wijinputcore;
            })(ElementDirective);
            definitions.wijinputcore = wijinputcore;            
            var wijinputdate = (function (_super) {
                __extends(wijinputdate, _super);
                function wijinputdate() {
                    _super.apply(this, arguments);

                }
                return wijinputdate;
            })(wijinputcore);
            definitions.wijinputdate = wijinputdate;            
            var wijinputmask = (function (_super) {
                __extends(wijinputmask, _super);
                function wijinputmask() {
                    _super.apply(this, arguments);

                }
                return wijinputmask;
            })(wijinputcore);
            definitions.wijinputmask = wijinputmask;            
            var wijinputnumber = (function (_super) {
                __extends(wijinputnumber, _super);
                function wijinputnumber() {
                    _super.apply(this, arguments);

                }
                return wijinputnumber;
            })(wijinputcore);
            definitions.wijinputnumber = wijinputnumber;            
            var wijcheckbox = (function (_super) {
                __extends(wijcheckbox, _super);
                function wijcheckbox() {
                    _super.apply(this, arguments);

                    this.expectedTemplate = "<input type='checkbox'/>";
                    this.delay = true;
                }
                return wijcheckbox;
            })(AttributeDirective);
            definitions.wijcheckbox = wijcheckbox;            
            var wijradio = (function (_super) {
                __extends(wijradio, _super);
                function wijradio() {
                    _super.apply(this, arguments);

                }
                return wijradio;
            })(wijcheckbox);
            definitions.wijradio = wijradio;            
            var wijsplitter = (function (_super) {
                __extends(wijsplitter, _super);
                function wijsplitter() {
                    _super.apply(this, arguments);

                    this.innerMarkupSelector = "panel1, panel2";
                }
                return wijsplitter;
            })(ElementDirective);
            definitions.wijsplitter = wijsplitter;            
            var wijexpander = (function (_super) {
                __extends(wijexpander, _super);
                function wijexpander() {
                    _super.apply(this, arguments);

                    this.innerMarkupSelector = "h1, div";
                }
                return wijexpander;
            })(ElementDirective);
            definitions.wijexpander = wijexpander;            
            var wijmenu = (function (_super) {
                __extends(wijmenu, _super);
                function wijmenu() {
                    _super.apply(this, arguments);

                    this.expectedTemplate = "<ul/>";
                }
                return wijmenu;
            })(ElementDirective);
            definitions.wijmenu = wijmenu;            
            var TabsMarkup = (function (_super) {
                __extends(TabsMarkup, _super);
                function TabsMarkup(node, typeDef, services) {
                                _super.call(this, node, typeDef, "tab", services);
                    this.services = services;
                }
                TabsMarkup.prototype.apply = function (scope, parentElement) {
                    _super.prototype.apply.call(this, scope, parentElement);
                    var ul = parentElement.children("ul").first();
                    if(ul.length == 0) {
                        ul = $("<ul/>");
                        ul.prependTo(parentElement);
                    }
                    angular.forEach(this.subElements, function (se) {
                        if(!se.element.is("tab")) {
                            return;
                        }
                        var id = se.element.attr("id"), anchor = $("<a/>").text(se.element.attr("title"));
                        if(id) {
                            anchor.attr("href", "#" + id);
                        }
                        $("<li/>").append(anchor).appendTo(ul);
                    });
                };
                return TabsMarkup;
            })(Markup);            
            var wijtabs = (function (_super) {
                __extends(wijtabs, _super);
                function wijtabs() {
                    _super.apply(this, arguments);

                }
                wijtabs.prototype.createMarkup = function (element, typeDef) {
                    return new TabsMarkup(element, typeDef, this.services);
                };
                return wijtabs;
            })(ElementDirective);
            definitions.wijtabs = wijtabs;            
            var gcSpread = (function (_super) {
                __extends(gcSpread, _super);
                function gcSpread() {
                    _super.apply(this, arguments);

                }
                gcSpread.prototype.setOption = function (path, value) {
                    if(path === "dataSource") {
                        this.widget.sheets[0].setDataSource(value);
                    } else {
                        _super.prototype.setOption.call(this, path, value);
                    }
                };
                return gcSpread;
            })(ElementDirective);
            definitions.gcSpread = gcSpread;            
            function findDirectiveClass(widgetName) {
                var metadata = widgetMetadata[widgetName], parentMetadata;
                return definitions[widgetName] || metadata && metadata.inherits && findDirectiveClass(metadata.inherits);
            }
            definitions.findDirectiveClass = findDirectiveClass;
        })(definitions || (definitions = {}));
        // define the wijmo module
        var wijModule = angular["module"]('wijmo', []);
        function registerDirective(widgetName, namespace, clazz, directiveName) {
            var meta = widgetMetadata[widgetName], isDecorator = meta && meta.isDecorator, directiveClass = definitions.findDirectiveClass(widgetName) || (isDecorator ? definitions.AttributeDirective : definitions.ElementDirective);
            wijModule.directive(directiveName || widgetName.toLowerCase(), [
                "$compile", 
                function ($compile) {
                    return new directiveClass(widgetName, namespace, clazz, {
                        $compile: $compile
                    });
                }            ]);
        }
        var widgetMetadata = {
            "base": {
                events: {
                    "create": {
                    },
                    "change": {
                    }
                }
            },
            "wijtooltip": {
                "events": {
                    "showing": {
                    },
                    "shown": {
                    },
                    "hiding": {
                    },
                    "hidden": {
                    }
                },
                "properties": {
                    "group": {
                    },
                    "ajaxCallback": {
                    }
                }
            },
            "wijslider": {
                "events": {
                    "buttonMouseOver": {
                    },
                    "buttonMouseOut": {
                    },
                    "buttonMouseDown": {
                    },
                    "buttonMouseUp": {
                    },
                    "buttonClick": {
                    },
                    "start": {
                    },
                    "stop": {
                    }
                },
                "properties": {
                    "value": {
                        changeEvent: "change"
                    },
                    "values": {
                        changeEvent: "change"
                    }
                }
            },
            "wijsplitter": {
                "events": {
                    "sized": {
                    },
                    "load": {
                    },
                    "sizing": {
                    }
                },
                "properties": {
                    "expand": {
                    },
                    "collapse": {
                    },
                    "expanded": {
                    },
                    "collapsed": {
                    },
                    splitterDistance: {
                        type: "number",
                        changeEvent: "sized"
                    }
                }
            },
            "wijprogressbar": {
                "properties": {
                    "progressChanging": {
                    },
                    "beforeProgressChanging": {
                    },
                    "progressChanged": {
                    },
                    value: {
                        type: "number",
                        changeEvent: "change"
                    }
                }
            },
            "wijdialog": {
                "events": {
                    "blur": {
                    },
                    "buttonCreating": {
                    },
                    "resize": {
                    },
                    "stateChanged": {
                    },
                    "focus": {
                    },
                    "resizeStart": {
                    },
                    "resizeStop": {
                    }
                },
                "properties": {
                    "hide": {
                    },
                    "show": {
                    },
                    "collapsingAnimation": {
                    },
                    "expandingAnimation": {
                    }
                }
            },
            "wijaccordion": {
                "events": {
                    "beforeSelectedIndexChanged": {
                    },
                    "selectedIndexChanged": {
                    }
                },
                "properties": {
                    "duration": {
                    },
                    selectedIndex: {
                        type: "number",
                        changeEvent: "selectedindexchanged"
                    }
                }
            },
            "wijpopup": {
                "events": {
                    "showing": {
                    },
                    "shown": {
                    },
                    "hiding": {
                    },
                    "hidden": {
                    },
                    "posChanged": {
                    }
                }
            },
            "wijsuperpanel": {
                "events": {
                    "dragStop": {
                    },
                    "painted": {
                    },
                    "scroll": {
                    },
                    "scrolling": {
                    },
                    "scrolled": {
                    },
                    "resized": {
                    }
                },
                "properties": {
                    "hScrollerActivating": {
                    },
                    "vScrollerActivating": {
                    }
                }
            },
            "wijcheckbox": {
                isDecorator: true,
                "properties": {
                    "checked": {
                        type: "bool",
                        changeEvent: "changed"
                    }
                }
            },
            "wijradio": {
                isDecorator: true,
                "properties": {
                    "checked": {
                        type: "bool",
                        changeEvent: "changed"
                    }
                }
            },
            "wijlist": {
                "events": {
                    "focusing": {
                    },
                    "focus": {
                    },
                    "blur": {
                    },
                    "selected": {
                    },
                    "listRendered": {
                    },
                    "itemRendering": {
                    },
                    "itemRendered": {
                    }
                },
                "properties": {
                    "superPanelOptions": {
                    }
                }
            },
            "wijcalendar": {
                "events": {
                    "beforeSlide": {
                    },
                    "beforeSelect": {
                    },
                    "selectedDatesChanged": {
                    },
                    "afterSelect": {
                    },
                    "afterSlide": {
                    }
                },
                "properties": {
                    "customizeDate": {
                    },
                    "title": {
                    },
                    selectedDates: {
                        type: "array",
                        elementType: "date",
                        changeEvent: "selecteddateschanged"
                    }
                }
            },
            wijdropdown: {
                isDecorator: true
            },
            "wijexpander": {
                "events": {
                    "beforeCollapse": {
                    },
                    "afterCollapse": {
                    },
                    "beforeExpand": {
                    },
                    "afterExpand": {
                    }
                },
                properties: {
                    expanded: {
                        type: "bool",
                        attachEvents: [
                            "aftercollapse", 
                            "afterexpand"
                        ]
                    }
                }
            },
            "wijmenu": {
                "events": {
                    "focus": {
                    },
                    "blur": {
                    },
                    "select": {
                    },
                    "showing": {
                    },
                    "shown": {
                    },
                    "hidding": {
                    },
                    "hidden": {
                    }
                },
                "properties": {
                    "superPanelOptions": {
                    }
                }
            },
            "wijmenuitem": {
                "events": {
                    "hidding": {
                    },
                    "hidden": {
                    },
                    "showing": {
                    },
                    "shown": {
                    }
                }
            },
            "wijtabs": {
                "properties": {
                    "ajaxOptions": {
                    },
                    "cookie": {
                    },
                    "hideOption": {
                    },
                    "showOption": {
                    },
                    "add": {
                    },
                    "remove": {
                    },
                    "select": {
                    },
                    "beforeShow": {
                    },
                    "show": {
                    },
                    "load": {
                    },
                    "disable": {
                    },
                    "enable": {
                    }
                }
            },
            wijtextbox: {
                isDecorator: true
            },
            "wijpager": {
                "events": {
                    "pageIndexChanging": {
                    },
                    "pageIndexChanged": {
                    }
                },
                properties: {
                    pageIndex: {
                        type: "numeric",
                        changeEvent: "pageindexchanged"
                    }
                }
            },
            "wijcombobox": {
                "events": {
                    "select": {
                    },
                    "search": {
                    },
                    "open": {
                    },
                    "close": {
                    }
                },
                "properties": {
                    dataSource: {
                        type: "array",
                        twoWayBinding: true
                    },
                    data: {
                        twoWayBinding: true
                    },
                    value: {
                        changeEvent: "change"
                    },
                    "labelText": {
                    },
                    "showingAnimation": {
                    },
                    "hidingAnimation": {
                    },
                    selectedIndex: {
                        type: "numeric",
                        changeEvent: "changed"
                    },
                    selectedValue: {
                        changeEvent: "changed"
                    },
                    text: {
                        changeEvent: "changed"
                    },
                    inputTextInDropDownList: {
                        changeEvent: "changed"
                    },
                    "listOptions": {
                    }
                }
            },
            "wijinputcore": {
                "events": {
                    "initializing": {
                    },
                    "initialized": {
                    },
                    "triggerMouseDown": {
                    },
                    "triggerMouseUp": {
                    },
                    "initialized": {
                    },
                    "textChanged": {
                    },
                    "invalidInput": {
                    }
                }
            },
            "wijinputdate": {
                inherits: "wijinputcore",
                "events": {
                    "dateChanged": {
                    }
                },
                "properties": {
                    date: {
                        type: "datetime",
                        changeEvent: [
                            "dateChanged", 
                            "textChanged"
                        ]
                    },
                    "minDate": {
                    },
                    "maxDate": {
                    }
                }
            },
            "wijinputmask": {
                inherits: "wijinputcore",
                "properties": {
                    "text": {
                        type: "string",
                        changeEvent: "textChanged"
                    }
                }
            },
            "wijinputnumber": {
                inherits: "wijinputcore",
                "events": {
                    "valueChanged": {
                    },
                    "valueBoundsExceeded": {
                    }
                },
                "properties": {
                    value: {
                        type: "number",
                        changeEvent: [
                            "valueChanged", 
                            "textChanged"
                        ]
                    }
                }
            },
            "wijgrid": {
                "properties": {
                    data: {
                        changeEvent: "afterCellEdit"
                    },
                    dataSource: {
                        twoWayBinding: true
                    },
                    "columns": {
                        type: "array",
                        elementType: {
                            type: "object",
                            properties: {
                                readOnly: {
                                    type: "bool"
                                },
                                "dataKey": {
                                    type: "string"
                                },
                                "dataType": {
                                    type: "string"
                                },
                                "headerText": {
                                    type: "string"
                                },
                                groupInfo: {
                                    type: "object",
                                    properties: {
                                        headerText: {
                                        },
                                        footerText: {
                                        },
                                        outlineMode: {
                                        }
                                    }
                                }
                            }
                        }
                    }
                },
                "events": {
                    "ajaxError": {
                    },
                    "dataLoading": {
                    },
                    "dataLoaded": {
                    },
                    "loading": {
                    },
                    "loaded": {
                    },
                    "columnDropping": {
                    },
                    "columnDropped": {
                    },
                    "columnGrouping": {
                    },
                    "columnGrouped": {
                    },
                    "columnUngrouping": {
                    },
                    "columnUngrouped": {
                    },
                    "filtering": {
                    },
                    "filtered": {
                    },
                    "sorting": {
                    },
                    "sorted": {
                    },
                    "currentCellChanged": {
                    },
                    "pageIndexChanging": {
                    },
                    "pageIndexChanged": {
                    },
                    "rendering": {
                    },
                    "rendered": {
                    },
                    "columnResizing": {
                    },
                    "columnResized": {
                    },
                    "currentCellChanging": {
                    },
                    "afterCellEdit": {
                    },
                    "afterCellUpdate": {
                    },
                    "beforeCellEdit": {
                    },
                    "beforeCellUpdate": {
                    },
                    "columnDragging": {
                    },
                    "columnDragged": {
                    },
                    "filterOperatorsListShowing": {
                    },
                    "groupAggregate": {
                    },
                    "groupText": {
                    },
                    "invalidCellValue": {
                    },
                    "selectionChanged": {
                    }
                }
            },
            "wijchartcore": {
                "events": {
                    "beforeSeriesChange": {
                    },
                    "afterSeriesChange": {
                    },
                    "seriesChanged": {
                    },
                    "beforePaint": {
                    },
                    "painted": {
                    },
                    "mouseDown": {
                    },
                    "mouseUp": {
                    },
                    "mouseOver": {
                    },
                    "mouseOut": {
                    },
                    "mouseMove": {
                    },
                    "click": {
                    }
                },
                "properties": {
                    data: {
                        twoWayBinding: true
                    },
                    dataSource: {
                        twoWayBinding: true
                    },
                    "width": {
                        type: "number"
                    },
                    "height": {
                        type: "number"
                    },
                    seriesList: {
                        changeEvent: "serieschanged",
                        type: "array"
                    }
                }
            },
            "wijcompositechart": {
                inherits: "wijchartcore"
            },
            "wijbarchart": {
                inherits: "wijchartcore"
            },
            "wijlinechart": {
                inherits: "wijchartcore",
                "properties": {
                    "hole": {
                    }
                }
            },
            "wijscatterchart": {
                inherits: "wijchartcore"
            },
            "wijbubblechart": {
                inherits: "wijchartcore"
            },
            "wijpiechart": {
                inherits: "wijchartcore",
                "properties": {
                    "radius": {
                        type: "number"
                    }
                }
            },
            "wijtree": {
                "events": {
                    "nodeBeforeDropped": {
                    },
                    "nodeDropped": {
                    },
                    "nodeBlur": {
                    },
                    "nodeFocus": {
                    },
                    "nodeClick": {
                    },
                    "nodeCheckChanged": {
                    },
                    "nodeCollapsed": {
                    },
                    "nodeExpanded": {
                    },
                    "nodeDragging": {
                    },
                    "nodeDragStarted": {
                    },
                    "nodeMouseOver": {
                    },
                    "nodeMouseOut": {
                    },
                    "nodeTextChanged": {
                    },
                    "selectedNodeChanged": {
                    },
                    "nodeExpanding": {
                    },
                    "nodeCollapsing": {
                    }
                },
                properties: {
                    nodes: {
                        type: "array",
                        changeEvent: [
                            "nodeCheckChanged", 
                            "nodeCollapsed", 
                            "nodeExpanded", 
                            "nodeTextChanged", 
                            "selectedNodeChanged"
                        ]
                    }
                }
            },
            "wijtreenode": {
                "events": {
                    "nodeTextChanged": {
                    },
                    "nodeDragStarted": {
                    },
                    "nodeDragging": {
                    },
                    "nodeCheckChanged": {
                    },
                    "nodeFocus": {
                    },
                    "nodeBlur": {
                    },
                    "nodeClick": {
                    },
                    "selectedNodeChanged": {
                    },
                    "nodeMouseOver": {
                    },
                    "nodeMouseOut": {
                    }
                }
            },
            "wijupload": {
                "events": {
                    "cancel": {
                    },
                    "totalComplete": {
                    },
                    "progress": {
                    },
                    "complete": {
                    },
                    "totalProgress": {
                    },
                    "upload": {
                    },
                    "totalUpload": {
                    }
                }
            },
            "wijwizard": {
                "events": {
                    "show": {
                    },
                    "add": {
                    },
                    "remove": {
                    },
                    "activeIndexChanged": {
                    },
                    "validating": {
                    },
                    "load": {
                    }
                },
                "properties": {
                    "ajaxOptions": {
                    },
                    "cookie": {
                    }
                }
            },
            "wijribbon": {
                "events": {
                    "click": {
                    }
                }
            },
            "wijeditor": {
                "events": {
                    "commandButtonClick": {
                    },
                    "textChanged": {
                    }
                },
                "properties": {
                    "simpleModeCommands": {
                    },
                    "text": {
                    },
                    "localization": {
                    },
                    text: {
                        type: "string",
                        changeEvent: "textChanged"
                    }
                }
            },
            "wijrating": {
                "events": {
                    "hover": {
                    },
                    "rating": {
                    },
                    "rated": {
                    },
                    "reset": {
                    }
                },
                "properties": {
                    "min": {
                    },
                    "max": {
                    },
                    "animation": {
                    },
                    value: {
                        type: "numeric",
                        changeEvent: [
                            "rated", 
                            "reset"
                        ]
                    }
                }
            },
            "wijcarousel": {
                "events": {
                    "loadCallback": {
                    },
                    "itemClick": {
                    },
                    "beforeScroll": {
                    },
                    "afterScroll": {
                    },
                    "create": {
                    }
                }
            },
            "wijgallery": {
                "events": {
                    "loadCallback": {
                    },
                    "beforeTransition": {
                    },
                    "afterTransition": {
                    },
                    "create": {
                    }
                }
            },
            "wijgauge": {
                "properties": {
                    "ranges": {
                        type: "array",
                        elementType: {
                            type: "object",
                            properties: {
                                "startValue": {
                                    type: "number"
                                },
                                "endValue": {
                                    type: "number"
                                },
                                "startDistance": {
                                    type: "number"
                                },
                                "endDistance": {
                                    type: "number"
                                },
                                "startWidth": {
                                    type: "number"
                                },
                                "endWidth": {
                                    type: "number"
                                }
                            }
                        }
                    }
                },
                "events": {
                    "beforeValueChanged": {
                    },
                    "valueChanged": {
                    },
                    "painted": {
                    },
                    "click": {
                    },
                    "create": {
                    }
                }
            },
            "wijlineargauge": {
                inherits: "wijgauge"
            },
            "wijradialgauge": {
                inherits: "wijgauge"
            },
            "wijlightbox": {
                "events": {
                    "show": {
                    },
                    "beforeShow": {
                    },
                    "beforeClose": {
                    },
                    "close": {
                    },
                    "open": {
                    }
                },
                "properties": {
                    "cookie": {
                    }
                }
            },
            "wijdatepager": {
                "events": {
                    "selectedDateChanged": {
                    }
                },
                "properties": {
                    "localization": {
                    }
                }
            },
            "wijevcal": {
                "events": {
                    "viewTypeChanged": {
                    },
                    "selectedDatesChanged": {
                    },
                    "initialized": {
                    },
                    "beforeDeleteCalendar": {
                    },
                    "beforeAddCalendar": {
                    },
                    "beforeUpdateCalendar": {
                    },
                    "beforeAddEvent": {
                    },
                    "beforeUpdateEvent": {
                    },
                    "beforeDeleteEvent": {
                    },
                    "beforeEditEventDialogShow": {
                    },
                    "eventsDataChanged": {
                    },
                    "calendarsChanged": {
                    }
                },
                "properties": {
                    "localization": {
                    },
                    "datePagerLocalization": {
                    },
                    "colors": {
                    },
                    "selectedDate": {
                    },
                    "selectedDates": {
                    },
                    eventsData: {
                        type: "array",
                        changeEvent: "eventsdatachanged"
                    },
                    appointments: {
                        type: "array",
                        changeEvent: "eventsdatachanged"
                    }
                }
            },
            wijvideo: {
                isDecorator: true
            },
            "gcSpread": {
                properties: {
                    dataSource: {
                        type: "array"
                    },
                    sheetCount: {
                        type: "number"
                    },
                    sheets: {
                        type: "array",
                        elementType: {
                            type: "object",
                            properties: {
                                rowCount: {
                                    type: "number"
                                },
                                colCount: {
                                    type: "number"
                                },
                                defaultRowCount: {
                                    type: "number"
                                },
                                defaultColCount: {
                                    type: "number"
                                }
                            }
                        }
                    }
                }
            }
        };
        // register directives for all widgets
        $.each($.wijmo, function (name, clazz) {
            if(!name.match(/^wij/)) {
                return;
            }
            var directiveName = "wij" + name.charAt(3).toUpperCase() + name.substring(4);
            registerDirective(name, "wijmo", clazz, directiveName);
        });
        $.each($.ui, function (name, clazz) {
            return registerDirective(name, "ui", clazz, "jqui" + name.charAt(0).toUpperCase() + name.substring(1));
        });
        function hasChildElements(node) {
            if(!node || !node.childNodes) {
                return false;
            }
            var len = node.childNodes.length;
            for(var i = 0; i < len; i++) {
                var child = node.childNodes[i];
                if(child.nodeType == Node.ELEMENT_NODE) {
                    return true;
                }
            }
            return false;
        }
    })(wijmo.ng || (wijmo.ng = {}));
    var ng = wijmo.ng;
})(wijmo || (wijmo = {}));
