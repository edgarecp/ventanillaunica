<?php

/* GeneralComunBundle:Public:_listadoOpPag.html.twig */
class __TwigTemplate_6778f20e4642bd42cf18ac3dd70bd78d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["cxp"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "cxp"), "method");
        // line 2
        echo "<div class=\"grid_3\"><center>
    ";
        // line 3
        if (((isset($context["vBtnFil"]) ? $context["vBtnFil"] : null) == "S")) {
            echo "<a href=\"";
            echo $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_filtrar"));
            echo "\" class='btnGFil'>Filtrar</a>";
        }
        // line 4
        echo "    ";
        if (((isset($context["vBtnNew"]) ? $context["vBtnNew"] : null) == "S")) {
            echo "<a href=\"";
            echo $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_new"));
            echo "\"    class='btn'>Nuevo</a>";
        }
        // line 5
        echo "    &nbsp;
</center></div>
<div class=\"grid_10 alpha omega\">";
        // line 7
        echo $this->env->getExtension('knp_pagination')->render((isset($context["paginacion"]) ? $context["paginacion"] : null));
        echo "</div>
";
        // line 8
        if (((isset($context["vCambiarCxp"]) ? $context["vCambiarCxp"] : null) == "S")) {
            // line 9
            echo "<div class=\"grid_2\"><center>
    <div class=\"cxp\">Item x pagina:<br>
    <a href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_grabarSesion"), array("var" => "cxp", "val" => 20)), "html", null, true);
            echo "\"  class=\"";
            echo ((((isset($context["cxp"]) ? $context["cxp"] : null) == 20)) ? ("btn_d") : ("btn_o"));
            echo "\">20</a>
    <a href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_grabarSesion"), array("var" => "cxp", "val" => 50)), "html", null, true);
            echo "\"  class=\"";
            echo ((((isset($context["cxp"]) ? $context["cxp"] : null) == 50)) ? ("btn_d") : ("btn_o"));
            echo "\">50</a>
    <a href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_grabarSesion"), array("var" => "cxp", "val" => 100)), "html", null, true);
            echo "\" class=\"";
            echo ((((isset($context["cxp"]) ? $context["cxp"] : null) == 100)) ? ("btn_d") : ("btn_o"));
            echo "\">100</a>
    </div>
</center></div>
";
        }
        // line 17
        echo "<div class=\"clear\"></div>
";
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:Public:_listadoOpPag.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 17,  63 => 13,  57 => 12,  51 => 11,  47 => 9,  45 => 8,  30 => 4,  24 => 3,  21 => 2,  19 => 1,  268 => 42,  260 => 40,  257 => 39,  250 => 38,  244 => 37,  241 => 36,  238 => 35,  234 => 45,  231 => 44,  228 => 35,  225 => 34,  222 => 33,  216 => 27,  211 => 26,  206 => 63,  202 => 61,  196 => 60,  192 => 59,  189 => 58,  185 => 56,  182 => 55,  179 => 54,  174 => 53,  171 => 52,  169 => 51,  165 => 49,  136 => 48,  121 => 46,  119 => 33,  114 => 32,  97 => 31,  92 => 28,  87 => 27,  85 => 26,  75 => 23,  69 => 20,  65 => 18,  62 => 17,  60 => 16,  49 => 15,  43 => 11,  41 => 7,  39 => 9,  37 => 5,  35 => 7,  33 => 6,  29 => 4,  27 => 3,  25 => 2,  23 => 1,  156 => 22,  154 => 21,  148 => 20,  142 => 19,  138 => 18,  134 => 17,  130 => 16,  123 => 15,  120 => 14,  112 => 12,  107 => 11,  101 => 10,  95 => 9,  89 => 8,  83 => 7,  81 => 25,  78 => 24,  31 => 5,  28 => 3,);
    }
}
