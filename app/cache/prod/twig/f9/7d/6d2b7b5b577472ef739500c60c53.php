<?php

/* GeneralComunBundle::blanco.html.twig */
class __TwigTemplate_f97d6d2b7b5b577472ef739500c60c53 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'jScYCss' => array($this, 'block_jScYCss'),
            'cuerpo' => array($this, 'block_cuerpo'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"es\">
    <head>
        <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo " - Caja Petrolera de Salud.</title>
        <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/imagenes/favicon.png"), "html", null, true);
        echo "\" rel=\"shortcut icon\"/>
        ";
        // line 7
        echo "        <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/css/960.css"), "html", null, true);
        echo "\"          rel=\"stylesheet\" type=\"text/css\"/>
        ";
        // line 8
        $this->displayBlock('jScYCss', $context, $blocks);
        // line 9
        echo "    </head>
    <body>
        <div class=\"container_16\">
            ";
        // line 12
        $this->displayBlock('cuerpo', $context, $blocks);
        // line 13
        echo "        </div> 
    </body>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 8
    public function block_jScYCss($context, array $blocks = array())
    {
    }

    // line 12
    public function block_cuerpo($context, array $blocks = array())
    {
        echo "BODY";
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle::blanco.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 12,  61 => 8,  56 => 4,  49 => 13,  47 => 12,  40 => 8,  27 => 4,  22 => 1,  78 => 35,  76 => 34,  70 => 30,  42 => 9,  38 => 6,  35 => 7,  33 => 4,  31 => 5,  28 => 2,);
    }
}
