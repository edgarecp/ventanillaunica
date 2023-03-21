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
    /// <reference path="../Base/jquery.wijmo.widget.ts" />
    /*globals jQuery*/
    /*
    * Depends:
    *  jquery.mobile.js
    *
    */
    (function (listview) {
        "use strict";
        var $ = jQuery, widgetName = "wijlistview";
        var wijlistview = (function (_super) {
            __extends(wijlistview, _super);
            function wijlistview() {
                _super.apply(this, arguments);

            }
            wijlistview.prototype._baseWidget = function () {
                return $.mobile.listview;
            };
            return wijlistview;
        })(wijmo.wijmoWidget);
        listview.wijlistview = wijlistview;        
        // empty so far
        if($.mobile) {
            wijlistview.prototype.options = $.extend({
            }, $.mobile.listview.prototype.options, wijmo.wijmoWidget.prototype.options, {
                initSelector: ":jqmData(role='wijlistview')"
            });
            $.wijmo.registerWidget(widgetName, $.mobile.listview, wijlistview.prototype);
        }
        /** jQuery-mobile 1.3.1 */
        if($.mobile && $.mobile.document) {
            wijlistview.prototype.options.filter = false;
            wijlistview.prototype.options.filterPlaceholder = "Filter items...";
            wijlistview.prototype.options.filterTheme = "c";
            wijlistview.prototype.options.filterReveal = false;
            // TODO rename callback/deprecate and default to the item itself as the first argument
            var defaultFilterCallback = function (text, searchValue, item) {
                return text.toString().toLowerCase().indexOf(searchValue) === -1;
            };
            wijlistview.prototype.options.filterCallback = defaultFilterCallback;
            $.mobile.document.delegate("ul, ol", "wijlistviewcreate", function () {
                var list = $(this), listview = list.data("wijmoWijlistview");
                if(!listview || !listview.options.filter) {
                    return;
                }
                if(listview.options.filterReveal) {
                    list.children().addClass("ui-screen-hidden");
                }
                var wrapper = $("<form>", {
                    "class": "ui-listview-filter ui-bar-" + listview.options.filterTheme,
                    "role": "search"
                }).submit(function (e) {
                    e.preventDefault();
                    search.blur();
                }), onKeyUp = function (e) {
                    var $this = $(this), val = this.value.toLowerCase(), listItems = null, li = list.children(), lastval = $this.jqmData("lastval") + "", childItems = false, itemtext = "", item, isCustomFilterCallback = // Check if a custom filter callback applies
                    listview.options.filterCallback !== defaultFilterCallback;
                    if(lastval && lastval === val) {
                        // Execute the handler only once per value change
                        return;
                    }
                    listview._trigger("beforefilter", "beforefilter", {
                        input: this
                    });
                    // Change val as lastval for next execution
                    $this.jqmData("lastval", val);
                    if(isCustomFilterCallback || val.length < lastval.length || val.indexOf(lastval) !== 0) {
                        // Custom filter callback applies or removed chars or pasted something totally different, check all items
                        listItems = list.children();
                    } else {
                        // Only chars added, not removed, only use visible subset
                        listItems = list.children(":not(.ui-screen-hidden)");
                        if(!listItems.length && listview.options.filterReveal) {
                            listItems = list.children(".ui-screen-hidden");
                        }
                    }
                    if(val) {
                        // This handles hiding regular rows without the text we search for
                        // and any list dividers without regular rows shown under it
                        for(var i = listItems.length - 1; i >= 0; i--) {
                            item = $(listItems[i]);
                            itemtext = item.jqmData("filtertext") || item.text();
                            if(item.is("li:jqmData(role=list-divider)")) {
                                item.toggleClass("ui-filter-hidequeue", !childItems);
                                // New bucket!
                                childItems = false;
                            } else if(listview.options.filterCallback(itemtext, val, item)) {
                                //mark to be hidden
                                item.toggleClass("ui-filter-hidequeue", true);
                            } else {
                                // There's a shown item in the bucket
                                childItems = true;
                            }
                        }
                        // Show items, not marked to be hidden
                        listItems.filter(":not(.ui-filter-hidequeue)").toggleClass("ui-screen-hidden", false);
                        // Hide items, marked to be hidden
                        listItems.filter(".ui-filter-hidequeue").toggleClass("ui-screen-hidden", true).toggleClass("ui-filter-hidequeue", false);
                    } else {
                        //filtervalue is empty => show all
                        listItems.toggleClass("ui-screen-hidden", !!listview.options.filterReveal);
                    }
                    listview._addFirstLastClasses(li, listview._getVisibles(li, false), false);
                }, search = $("<input>", {
                    placeholder: listview.options.filterPlaceholder
                }).attr("data-" + $.mobile.ns + "type", "search").jqmData("lastval", "").bind("keyup change input", onKeyUp).appendTo(wrapper).textinput();
                if(listview.options.inset) {
                    wrapper.addClass("ui-listview-filter-inset");
                }
                wrapper.bind("submit", function () {
                    return false;
                }).insertBefore(list);
            });
            wijlistview.prototype.options.autodividers = false;
            wijlistview.prototype.options.autodividersSelector = function (elt) {
                // look for the text in the given element
                var text = $.trim(elt.text()) || null;
                if(!text) {
                    return null;
                }
                // create the text for the divider (first uppercased letter)
                text = text.slice(0, 1).toUpperCase();
                return text;
            };
            $.mobile.document.delegate("ul,ol", "wijlistviewcreate", function () {
                var list = $(this), listview = list.data("wijmoWijlistview");
                if(!listview || !listview.options.autodividers) {
                    return;
                }
                var replaceDividers = function () {
                    list.find("li:jqmData(role='list-divider')").remove();
                    var lis = list.find('li'), lastDividerText = null, li, dividerText;
                    for(var i = 0; i < lis.length; i++) {
                        li = lis[i];
                        dividerText = listview.options.autodividersSelector($(li));
                        if(dividerText && lastDividerText !== dividerText) {
                            var divider = document.createElement('li');
                            divider.appendChild(document.createTextNode(dividerText));
                            divider.setAttribute('data-' + $.mobile.ns + 'role', 'list-divider');
                            li.parentNode.insertBefore(divider, li);
                        }
                        lastDividerText = dividerText;
                    }
                };
                var afterListviewRefresh = function () {
                    list.unbind('listviewafterrefresh', afterListviewRefresh);
                    replaceDividers();
                    listview.refresh();
                    list.bind('listviewafterrefresh', afterListviewRefresh);
                };
                afterListviewRefresh();
            });
        }
    })(wijmo.listview || (wijmo.listview = {}));
    var listview = wijmo.listview;
})(wijmo || (wijmo = {}));
