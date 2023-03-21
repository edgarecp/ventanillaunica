<?php

/* GeneralComunBundle:Public:_listado.html.twig */
class __TwigTemplate_f05c47f49daca1f67fa3889fc7ad5618 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'titulo' => array($this, 'block_titulo'),
            'accRegTit' => array($this, 'block_accRegTit'),
            'detalle' => array($this, 'block_detalle'),
            'accRegDet' => array($this, 'block_accRegDet'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["fil"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "fil"), "method");
        // line 2
        $context["vAccReg"] = ((array_key_exists("accReg", $context)) ? (_twig_default_filter((isset($context["accReg"]) ? $context["accReg"] : null), "S")) : ("S"));
        // line 3
        $context["vBtnNew"] = ((array_key_exists("btnNew", $context)) ? (_twig_default_filter((isset($context["btnNew"]) ? $context["btnNew"] : null), "S")) : ("S"));
        // line 4
        $context["vBtnMos"] = ((array_key_exists("btnMos", $context)) ? (_twig_default_filter((isset($context["btnMos"]) ? $context["btnMos"] : null), "S")) : ("S"));
        // line 5
        $context["vBtnMod"] = ((array_key_exists("btnMod", $context)) ? (_twig_default_filter((isset($context["btnMod"]) ? $context["btnMod"] : null), "S")) : ("S"));
        // line 6
        $context["vBtnDel"] = ((array_key_exists("btnDel", $context)) ? (_twig_default_filter((isset($context["btnDel"]) ? $context["btnDel"] : null), "S")) : ("S"));
        // line 7
        $context["vBtnFil"] = ((array_key_exists("btnFil", $context)) ? (_twig_default_filter((isset($context["btnFil"]) ? $context["btnFil"] : null), "S")) : ("S"));
        // line 8
        $context["vCambiarCxp"] = ((array_key_exists("cambiarCxp", $context)) ? (_twig_default_filter((isset($context["cambiarCxp"]) ? $context["cambiarCxp"] : null), "S")) : ("S"));
        // line 9
        $context["rut"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "rut"), "method");
        // line 10
        $context["tit"] = (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "tit"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "tit"), "method"), twig_capitalize_string_filter($this->env, (isset($context["rut"]) ? $context["rut"] : null)))) : (twig_capitalize_string_filter($this->env, (isset($context["rut"]) ? $context["rut"] : null))));
        // line 11
        echo "
<div class=\"grid_16\">
    <br />
    <fieldset>
        <legend>LISTADO (";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["tit"]) ? $context["tit"] : null), "html", null, true);
        echo "): Total:";
        echo twig_escape_filter($this->env, (isset($context["cantReg"]) ? $context["cantReg"] : null), "html", null, true);
        if (((isset($context["fil"]) ? $context["fil"] : null) != " ")) {
            echo " - Filtro:";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalItemCount"), "html", null, true);
            echo " ";
        }
        echo "</legend>
";
        // line 16
        if (((isset($context["cantReg"]) ? $context["cantReg"] : null) > 0)) {
            // line 17
            echo "\t\t";
            if ((($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalItemCount") == 0) && ((isset($context["fil"]) ? $context["fil"] : null) != " "))) {
                // line 18
                echo "            <br /><br />
            <center><h2>No existen Registros con ese Filtro.....</h2>
            <a href=\"";
                // line 20
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_grabarSesion"), array("var" => "fil", "val" => " ")), "html", null, true);
                echo "\" class=\"btn\">Quitar Filtro</a>
            </center>
        ";
            } else {
                // line 23
                echo "\t\t\t";
                $this->env->loadTemplate("GeneralComunBundle:Public:_listadoOpPag.html.twig")->display($context);
                // line 24
                echo "\t\t\t<table class='index'>
\t\t\t\t<thead><tr><th width= \"5%\">";
                // line 25
                echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginacion"]) ? $context["paginacion"] : null), "Id", "z.id");
                echo "</th>
\t\t\t\t\t\t   ";
                // line 26
                $this->displayBlock('titulo', $context, $blocks);
                // line 27
                echo "\t\t\t\t\t\t   ";
                if (((isset($context["vAccReg"]) ? $context["vAccReg"] : null) == "S")) {
                    $this->displayBlock('accRegTit', $context, $blocks);
                }
                // line 28
                echo "\t\t\t\t\t   </tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t  ";
                // line 31
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "items"));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                    // line 32
                    echo "\t\t\t\t\t<tr><td align='center'>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t";
                    // line 33
                    $this->displayBlock('detalle', $context, $blocks);
                    // line 46
                    echo "                    </tr>
                  ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 48
                echo "                  ";
                $tooltiptooltip594Options = array(
                );
                $tooltiptooltip594 = $this->env->getExtension('ui.core')->getWidget('ui.tooltip');
                echo $tooltiptooltip594->build()                        
                        ->in("#tooltip594")                        
                        ->addOptions($tooltiptooltip594Options)
                        ->_content("Detalle")
                        ->in(".btn_d")
                        ->execute();                
                $tooltiptooltip953Options = array(
                );
                $tooltiptooltip953 = $this->env->getExtension('ui.core')->getWidget('ui.tooltip');
                echo $tooltiptooltip953->build()                        
                        ->in("#tooltip953")                        
                        ->addOptions($tooltiptooltip953Options)
                        ->_content("Modificar")
                        ->in(".btn_m")
                        ->execute();                
                $tooltiptooltip709Options = array(
                );
                $tooltiptooltip709 = $this->env->getExtension('ui.core')->getWidget('ui.tooltip');
                echo $tooltiptooltip709->build()                        
                        ->in("#tooltip709")                        
                        ->addOptions($tooltiptooltip709Options)
                        ->_content("Borrar")
                        ->in(".btn_b")
                        ->execute();                
                // line 49
                echo "                </tbody>
            </table>
            ";
                // line 51
                if (($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "itemNumberPerPage") >= 20)) {
                    // line 52
                    echo "                ";
                    $context["salreg"] = ($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalItemCount") - (($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "currentPageNumber") - 1) * $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "itemNumberPerPage")));
                    // line 53
                    echo "                ";
                    if (((isset($context["salreg"]) ? $context["salreg"] : null) > 20)) {
                        $this->env->loadTemplate("GeneralComunBundle:Public:_listadoOpPag.html.twig")->display($context);
                    }
                    // line 54
                    echo "            ";
                }
                // line 55
                echo "        ";
            }
            // line 56
            echo "    </fieldset>
";
        } else {
            // line 58
            echo "    <br /><br />
    <center><h2>No existe (";
            // line 59
            echo twig_escape_filter($this->env, (isset($context["tit"]) ? $context["tit"] : null), "html", null, true);
            echo ")</h2>
    ";
            // line 60
            if (((isset($context["vBtnNew"]) ? $context["vBtnNew"] : null) == "S")) {
                echo "<a href=\"";
                echo $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_new"));
                echo "\" class='btn'>Crear Nuevo</a></center>";
            }
            // line 61
            echo "    </center>
";
        }
        // line 63
        echo "</div><div class=\"clear\"></div>
";
    }

    // line 26
    public function block_titulo($context, array $blocks = array())
    {
    }

    // line 27
    public function block_accRegTit($context, array $blocks = array())
    {
        echo "<th width='11%'>Acciones</th>";
    }

    // line 33
    public function block_detalle($context, array $blocks = array())
    {
        // line 34
        echo "\t\t\t\t\t\t";
        if (((isset($context["vAccReg"]) ? $context["vAccReg"] : null) == "S")) {
            // line 35
            echo "\t\t\t\t\t\t";
            $this->displayBlock('accRegDet', $context, $blocks);
            // line 44
            echo "                        ";
        }
        // line 45
        echo "                        ";
    }

    // line 35
    public function block_accRegDet($context, array $blocks = array())
    {
        // line 36
        echo "\t\t\t\t\t\t<td align='center'>
                            ";
        // line 37
        if (((isset($context["vBtnMos"]) ? $context["vBtnMos"] : null) == "S")) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_show"), array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"))), "html", null, true);
            echo "\" class='btn_d'><span class=\"ui-icon ui-icon-zoomin\"></span></a>";
        }
        // line 38
        echo "                            ";
        if (((isset($context["vBtnMod"]) ? $context["vBtnMod"] : null) == "S")) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_edit"), array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"))), "html", null, true);
            echo "\" class='btn_m'><span class=\"ui-icon ui-icon-pencil\"></span></a>";
        }
        // line 39
        echo "                            ";
        if (((((array_key_exists("cantTrans", $context)) ? (_twig_default_filter((isset($context["cantTrans"]) ? $context["cantTrans"] : null), 0)) : (0)) == 0) && ((isset($context["vBtnDel"]) ? $context["vBtnDel"] : null) == "S"))) {
            // line 40
            echo "                            <a href=\"#\" onclick=\"confirmDelete('";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_delete"), array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"))), "html", null, true);
            echo "', ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
            echo " );\" class='btn_b'><span class=\"ui-icon ui-icon-trash\"></span></a>
                            ";
        }
        // line 42
        echo "                        </td>
                        ";
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:Public:_listado.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  268 => 42,  260 => 40,  257 => 39,  250 => 38,  244 => 37,  241 => 36,  238 => 35,  234 => 45,  231 => 44,  228 => 35,  225 => 34,  222 => 33,  216 => 27,  211 => 26,  206 => 63,  202 => 61,  196 => 60,  192 => 59,  189 => 58,  185 => 56,  182 => 55,  179 => 54,  174 => 53,  171 => 52,  169 => 51,  165 => 49,  136 => 48,  121 => 46,  119 => 33,  114 => 32,  97 => 31,  92 => 28,  87 => 27,  85 => 26,  75 => 23,  69 => 20,  65 => 18,  62 => 17,  60 => 16,  49 => 15,  43 => 11,  41 => 10,  39 => 9,  37 => 8,  35 => 7,  33 => 6,  29 => 4,  27 => 3,  25 => 2,  23 => 1,  156 => 22,  154 => 21,  148 => 20,  142 => 19,  138 => 18,  134 => 17,  130 => 16,  123 => 15,  120 => 14,  112 => 12,  107 => 11,  101 => 10,  95 => 9,  89 => 8,  83 => 7,  81 => 25,  78 => 24,  31 => 5,  28 => 3,);
    }
}
