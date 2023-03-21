<?php

/* GeneralComunBundle::layout.html.twig */
class __TwigTemplate_f1fb395cc7e3b803acd3f73ea9529f8d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GeneralComunBundle::base.html.twig");

        $this->blocks = array(
            'jScYCss' => array($this, 'block_jScYCss'),
            'oJQ' => array($this, 'block_oJQ'),
            'oJScYCss' => array($this, 'block_oJScYCss'),
            'header' => array($this, 'block_header'),
            'menu' => array($this, 'block_menu'),
            'body' => array($this, 'block_body'),
            'cuerpo' => array($this, 'block_cuerpo'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GeneralComunBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["modulo"] = (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "modulo"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "modulo"), "method"), "GeneralComunBundle")) : ("GeneralComunBundle"));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_jScYCss($context, array $blocks = array())
    {
        // line 6
        echo "<!--jQuery References-->
<script src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/jquery/jquery/jquery.js"), "html", null, true);
        echo "\"       type=\"text/javascript\"></script>
<script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/jquery/jquery-ui/jquery-ui.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<!--Propia-->
<script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/js/confirmar.js"), "html", null, true);
        echo "\"  type=\"text/javascript\" ></script>
";
        // line 11
        $this->displayBlock('oJQ', $context, $blocks);
        // line 21
        echo "    ";
        $this->displayBlock('oJScYCss', $context, $blocks);
    }

    // line 11
    public function block_oJQ($context, array $blocks = array())
    {
        // line 12
        echo "<!--Theme-->
<link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/wijmo/Themes/aristo/jquery-wijmo.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"></script>
<!--Wijmo Widgets Base-->
<script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/wijmo/Wijmo/Base/jquery.wijmo.widget.min.js"), "html", null, true);
        echo "\"     type=\"text/javascript\"></script>
<script src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/wijmo/Wijmo/wijutil/jquery.wijmo.wijutil.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<!--Wijmo Widgets Menu-->
<link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/wijmo/Wijmo/wijmenu/jquery.wijmo.wijmenu.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"></script>
<script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/wijmo/Wijmo/wijmenu/jquery.wijmo.wijmenu.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
    }

    // line 21
    public function block_oJScYCss($context, array $blocks = array())
    {
    }

    // line 24
    public function block_header($context, array $blocks = array())
    {
        // line 25
        echo "<div class=\"grid_2\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/imagenes/logoEmpresa.jpg"), "html", null, true);
        echo "\" width='100' height ='75' alt=\"CPS\" /></div>
\t<div class=\"grid_12\"><img src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/imagenes/banner.jpg"), "html", null, true);
        echo "\" width='700' alt=\"banner\" /></div>
\t<div class=\"grid_2\"><img src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/imagenes/logoEmpresa.jpg"), "html", null, true);
        echo "\" width='100' height='75' alt=\"CPS\" /></div>
\t<div class='clear'></div>
";
    }

    // line 31
    public function block_menu($context, array $blocks = array())
    {
        echo "<center>";
        $template = $this->env->resolveTemplate(((isset($context["modulo"]) ? $context["modulo"] : null) . ":Main:_menu.html.twig"));
        $template->display($context);
        echo "</center>";
    }

    // line 33
    public function block_body($context, array $blocks = array())
    {
        // line 34
        echo "    <div id=\"confirmDelete\"></div>
    ";
        // line 35
        $this->displayBlock('cuerpo', $context, $blocks);
        // line 36
        echo "    <script type=\"text/javascript\">\$(function(){ \$(\"form:not(.filter) :input:visible:enabled:first\").focus(); });</script>
";
    }

    // line 35
    public function block_cuerpo($context, array $blocks = array())
    {
        echo "Cuerpo";
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 35,  133 => 36,  131 => 35,  128 => 34,  125 => 33,  116 => 31,  109 => 27,  105 => 26,  100 => 25,  97 => 24,  92 => 21,  86 => 19,  82 => 18,  77 => 16,  73 => 15,  68 => 13,  65 => 12,  62 => 11,  57 => 21,  55 => 11,  51 => 10,  46 => 8,  42 => 7,  39 => 6,  36 => 5,  31 => 3,  93 => 25,  83 => 18,  78 => 17,  72 => 16,  64 => 11,  61 => 10,  58 => 9,  53 => 7,  48 => 6,  43 => 5,  38 => 4,  33 => 3,);
    }
}
