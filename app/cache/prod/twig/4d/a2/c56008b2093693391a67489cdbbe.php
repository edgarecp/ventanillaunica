<?php

/* GeneralComunBundle:Public:_filtrar.html.twig */
class __TwigTemplate_4da2c56008b2093693391a67489cdbbe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'grid' => array($this, 'block_grid'),
            'datos' => array($this, 'block_datos'),
            'btnVolver' => array($this, 'block_btnVolver'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["ord"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "ord"), "method");
        // line 2
        $context["orddir"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "orddir"), "method");
        // line 3
        echo "
";
        // line 4
        $this->displayBlock('grid', $context, $blocks);
        // line 5
        echo "<br />
<fieldset>
    <legend>Filtrar (";
        // line 7
        echo twig_escape_filter($this->env, ((array_key_exists("tit", $context)) ? (_twig_default_filter((isset($context["tit"]) ? $context["tit"] : null), twig_capitalize_string_filter($this->env, (isset($context["ruta"]) ? $context["ruta"] : null)))) : (twig_capitalize_string_filter($this->env, (isset($context["ruta"]) ? $context["ruta"] : null)))), "html", null, true);
        echo "): Total:";
        echo twig_escape_filter($this->env, (isset($context["cantReg"]) ? $context["cantReg"] : null), "html", null, true);
        echo "</legend>
    <form action=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath(((isset($context["ruta"]) ? $context["ruta"] : null) . "_procesarfiltro"));
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
;
        echo ">
        <div>
        ";
        // line 10
        $this->displayBlock('datos', $context, $blocks);
        // line 11
        echo "        </div>
        ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

        <center>
        <button type=\"submit\" class='btn'>Filtrar</button>
        <button type=\"reset\"  class='btn_gb'>Limpiar Campos</button>
        </center>
    </form>
</fieldset>    
</div><div class=\"clear\"></div>
";
        // line 21
        $this->displayBlock('btnVolver', $context, $blocks);
        // line 22
        echo "<script type=\"text/javascript\">\$(function(){ \$(\"form:not(.filter) :input:visible:enabled:first\").focus(); });</script>";
    }

    // line 4
    public function block_grid($context, array $blocks = array())
    {
        echo "<div class=\"grid_10 prefix_3\">";
    }

    // line 10
    public function block_datos($context, array $blocks = array())
    {
    }

    // line 21
    public function block_btnVolver($context, array $blocks = array())
    {
        echo "<a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["ruta"]) ? $context["ruta"] : null) . "_listado"), array("ord" => (isset($context["ord"]) ? $context["ord"] : null), "orddir" => (isset($context["orddir"]) ? $context["orddir"] : null))), "html", null, true);
        echo "\" class='btn_ga'>Volver al listado</a>";
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:Public:_filtrar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 21,  78 => 10,  72 => 4,  68 => 22,  66 => 21,  54 => 12,  51 => 11,  49 => 10,  41 => 8,  35 => 7,  29 => 4,  26 => 3,  24 => 2,  22 => 1,  238 => 61,  234 => 60,  230 => 59,  224 => 56,  220 => 55,  216 => 54,  210 => 51,  206 => 50,  202 => 49,  196 => 46,  192 => 45,  188 => 44,  182 => 41,  178 => 40,  174 => 39,  168 => 36,  164 => 35,  160 => 34,  154 => 31,  150 => 30,  146 => 29,  140 => 26,  136 => 25,  132 => 24,  126 => 21,  122 => 20,  118 => 19,  112 => 16,  108 => 15,  104 => 14,  98 => 11,  94 => 10,  90 => 9,  87 => 8,  84 => 7,  39 => 6,  34 => 5,  31 => 5,  28 => 3,);
    }
}
