<?php

/* GeneralComunBundle:Main:index.html.twig */
class __TwigTemplate_e530bf8aabcc2dd7b4e8d4530f74243e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GeneralComunBundle::layout.html.twig");

        $this->blocks = array(
            'oJScYCss' => array($this, 'block_oJScYCss'),
            'cuerpo' => array($this, 'block_cuerpo'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GeneralComunBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["modulo"] = (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "modulo"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "modulo"), "method"), "GeneralComunBundle")) : ("GeneralComunBundle"));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_oJScYCss($context, array $blocks = array())
    {
        // line 6
        echo "<!--Wijmo Widgets Pager-->
<link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/wijmo/Wijmo/wijpager/jquery.wijmo.wijpager.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"></script>
<script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/wijmo/Wijmo/wijpager/jquery.wijmo.wijpager.min.js"), "html", null, true);
        echo "\"  type=\"text/javascript\"></script>
<!--Wijmo Widgets Carousel-->
<link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/wijmo/Wijmo/wijcarousel/jquery.wijmo.wijcarousel.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"></script>
<script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/wijmo/Wijmo/wijcarousel/jquery.wijmo.wijcarousel.min.js"), "html", null, true);
        echo "\"  type=\"text/javascript\"></script>
<!--Wijmo Widgets Accordion-->
<link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/wijmo/Wijmo/wijaccordion/jquery.wijmo.wijaccordion.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"></script>
<script src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/wijmo/Wijmo/wijaccordion/jquery.wijmo.wijaccordion.min.js"), "html", null, true);
        echo "\"  type=\"text/javascript\"></script>

<script type=\"text/javascript\">
    \$(document).ready(function () {
        \$(\"#carousel\").wijcarousel({
                display: 1,
                auto: true,
                interval: 3000,
                showTimer: false,
                showPager: true,
                loop: true,
                showControlsOnHover: false
        });
            
        \$(\"#accordion\").wijaccordion({
            header: \"h2\",
            event: \"mouseover\"
        });
    });
</script>
";
    }

    // line 36
    public function block_cuerpo($context, array $blocks = array())
    {
        // line 37
        echo "<div class=\"grid_6\">
    <br />
    <fieldset>
        <legend>Estado del Sistema</legend>
        <br />
        <center><h1>";
        // line 42
        echo twig_escape_filter($this->env, (isset($context["estSisDes"]) ? $context["estSisDes"] : $this->getContext($context, "estSisDes")), "html", null, true);
        echo "</h1></center>
        <br />
    </fieldset>
    <br /><br />
    <fieldset>
        <legend>Acceso Actual</legend>
        <table class=\"index\">
            <tr><td width=\"30%\">Usuario</td><td width=\"70%\">";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "html", null, true);
        echo "</td></tr>
            ";
        // line 50
        if (((isset($context["modulo"]) ? $context["modulo"] : $this->getContext($context, "modulo")) == "")) {
            // line 51
            echo "            <tr><td>Perfil</td><td>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "perfil"), "html", null, true);
            echo "</td></tr>
            ";
        }
        // line 53
        echo "            <tr><td>Ingreso</td><td>";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["accAct"]) ? $context["accAct"] : $this->getContext($context, "accAct")), "ingresoEl"), "d/m/Y h:i:s"), "html", null, true);
        echo "</td></tr>
            <tr><td>Maquina</td><td>";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["accAct"]) ? $context["accAct"] : $this->getContext($context, "accAct")), "maquina"), "html", null, true);
        echo "</td></tr>
        </table> 
        <br />        
    </fieldset>
    <br /><br />
    ";
        // line 59
        if (((isset($context["accAnt"]) ? $context["accAnt"] : $this->getContext($context, "accAnt")) == null)) {
            echo "    
    ";
        } else {
            // line 61
            echo "    <fieldset>
        <legend>Anterior Acceso</legend>
        <br />        
        <table class=\"index\">
            <tr><td width=\"30%\">Ingreso</td><td width=\"70%\">";
            // line 65
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["accAnt"]) ? $context["accAnt"] : $this->getContext($context, "accAnt")), "ingresoEl"), "d/m/Y h:i:s"), "html", null, true);
            echo "</td></tr>
            <tr><td>Salida</td><td>";
            // line 66
            if ($this->getAttribute((isset($context["accAnt"]) ? $context["accAnt"] : $this->getContext($context, "accAnt")), "salidaEl")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["accAnt"]) ? $context["accAnt"] : $this->getContext($context, "accAnt")), "salidaEl"), "d/m/Y h:i:s"), "html", null, true);
            }
            echo "</td></tr>
            <tr><td>Maquina</td><td>";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["accAnt"]) ? $context["accAnt"] : $this->getContext($context, "accAnt")), "maquina"), "html", null, true);
            echo "</td></tr>
        </table>
        <br /><br />
    </fieldset>
    ";
        }
        // line 72
        echo "</div>
<div class=\"grid_10\">
";
        // line 74
        $this->env->loadTemplate("GeneralComunBundle:Main:_carousel.html.twig")->display($context);
        // line 75
        $this->env->loadTemplate("GeneralComunBundle:Main:_noticias.html.twig")->display($context);
        // line 76
        echo "</div><div class=\"clear\"></div>
<br />
";
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:Main:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 76,  164 => 75,  162 => 74,  158 => 72,  150 => 67,  144 => 66,  140 => 65,  134 => 61,  129 => 59,  121 => 54,  116 => 53,  110 => 51,  108 => 50,  104 => 49,  94 => 42,  87 => 37,  84 => 36,  59 => 14,  55 => 13,  50 => 11,  46 => 10,  41 => 8,  37 => 7,  34 => 6,  31 => 5,  26 => 3,);
    }
}
