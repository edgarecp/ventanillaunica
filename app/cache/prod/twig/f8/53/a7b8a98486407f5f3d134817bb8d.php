<?php

/* GeneralComunBundle:Publico:_tituloReporte.html.twig */
class __TwigTemplate_f853a7b8a98486407f5f3d134817bb8d extends Twig_Template
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
        $context["vBlqIzq"] = ((array_key_exists("blqIzq", $context)) ? (_twig_default_filter((isset($context["blqIzq"]) ? $context["blqIzq"] : null), "logo")) : ("logo"));
        // line 2
        echo "
<div class=\"grid_3\">
";
        // line 4
        if (((isset($context["vBlqIzq"]) ? $context["vBlqIzq"] : null) == "logo")) {
            // line 5
            echo "   <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/imagenes/logoEmpresa.jpg"), "html", null, true);
            echo "\" width='105' height ='57' alt=\"CPS\" />
";
        } else {
            // line 7
            echo "    Caja Petrolera CPS
    <br />
    ";
            // line 9
            echo twig_escape_filter($this->env, ((array_key_exists("sistema", $context)) ? (_twig_default_filter((isset($context["sistema"]) ? $context["sistema"] : null), "nombreSistema")) : ("nombreSistema")), "html", null, true);
            echo "
";
        }
        // line 10
        echo "    
</div>

<div class=\"grid_10\">
    <center>
    <b>
    ";
        // line 16
        echo twig_escape_filter($this->env, ((array_key_exists("centro", $context)) ? (_twig_default_filter((isset($context["centro"]) ? $context["centro"] : null), "")) : ("")), "html", null, true);
        echo "<br />
    ";
        // line 17
        echo twig_escape_filter($this->env, ((array_key_exists("centro2", $context)) ? (_twig_default_filter((isset($context["centro2"]) ? $context["centro2"] : null), "")) : ("")), "html", null, true);
        echo "
    </b>
    </center>
</div>

<div class=\"grid_3\">
    <b>fecha:</b>";
        // line 23
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d/m/Y"), "html", null, true);
        echo "
    <br />
    <b>Hora :</b>";
        // line 25
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "H:i"), "html", null, true);
        echo "
</div>

<div class=\"clear\"></div>
";
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:Publico:_tituloReporte.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 25,  63 => 23,  54 => 17,  50 => 16,  37 => 9,  25 => 4,  21 => 2,  19 => 1,  66 => 12,  61 => 8,  56 => 4,  49 => 13,  47 => 12,  40 => 8,  27 => 5,  22 => 1,  78 => 35,  76 => 34,  70 => 30,  42 => 10,  38 => 6,  35 => 7,  33 => 7,  31 => 5,  28 => 2,);
    }
}
