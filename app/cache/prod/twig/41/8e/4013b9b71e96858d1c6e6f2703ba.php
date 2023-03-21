<?php

/* GeneralComunBundle::base.html.twig */
class __TwigTemplate_418e4013b9b71e96858d1c6e6f2703ba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'style' => array($this, 'block_style'),
            'jScYCss' => array($this, 'block_jScYCss'),
            'id' => array($this, 'block_id'),
            'header' => array($this, 'block_header'),
            'menu' => array($this, 'block_menu'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
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
        echo " - Caja Petrolera de Salud</title>
        <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/imagenes/favicon.png"), "html", null, true);
        echo "\" rel=\"shortcut icon\"/>        
        <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/css/960.css"), "html", null, true);
        echo "\"          rel=\"stylesheet\" type=\"text/css\"/>
        ";
        // line 7
        $this->displayBlock('style', $context, $blocks);
        // line 10
        echo "        <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/css/main.css"), "html", null, true);
        echo "\"         rel=\"stylesheet\" type=\"text/css\"/>
        ";
        // line 11
        $this->displayBlock('jScYCss', $context, $blocks);
        echo "      
    </head>
    <body id=\"";
        // line 13
        $this->displayBlock('id', $context, $blocks);
        echo "\">
        <header>
            <div class=\"container_16\">
                <div class=\"cabecera\">
                    ";
        // line 17
        $this->displayBlock('header', $context, $blocks);
        // line 18
        echo "                </div>
            </div>
        </header>
      
        <div class=\"container_16\">
            <div class=\"grid_16\">
                ";
        // line 24
        $this->displayBlock('menu', $context, $blocks);
        // line 25
        echo "            </div>
        </div>
      
        <div class=\"container_16\">
            <div id=\"cuerpo\">
                ";
        // line 30
        $this->displayBlock('body', $context, $blocks);
        // line 31
        echo "            </div>
        </div>   
      
        <footer>
            <div class=\"container_16\">
                ";
        // line 36
        $this->displayBlock('footer', $context, $blocks);
        // line 45
        echo "            </div>
        </footer>
    </body>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 7
    public function block_style($context, array $blocks = array())
    {
        // line 8
        echo "        <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/css/style.css"), "html", null, true);
        echo "\"        rel=\"stylesheet\" type=\"text/css\"/>
        ";
    }

    // line 11
    public function block_jScYCss($context, array $blocks = array())
    {
    }

    // line 13
    public function block_id($context, array $blocks = array())
    {
        echo "";
    }

    // line 17
    public function block_header($context, array $blocks = array())
    {
        echo "HEADER";
    }

    // line 24
    public function block_menu($context, array $blocks = array())
    {
        echo "MENU";
    }

    // line 30
    public function block_body($context, array $blocks = array())
    {
        echo "BODY";
    }

    // line 36
    public function block_footer($context, array $blocks = array())
    {
        // line 37
        echo "                <table border=\"0\">
                    <tr>
                        <td width=\"33%\" align=\"left\">Caja Petrolera de Salud<td>
                        <td width=\"34%\" align=\"center\">Diseñador : hansgc@hotmail.com<td>
                        <td width=\"33%\" align=\"right\">Santa Cruz - Bolivia<td>
                    </tr>
                </table>
                ";
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 37,  145 => 36,  139 => 30,  127 => 17,  121 => 13,  106 => 7,  101 => 4,  91 => 36,  84 => 31,  75 => 25,  63 => 17,  56 => 13,  44 => 7,  40 => 6,  32 => 4,  27 => 1,  138 => 35,  133 => 24,  131 => 35,  128 => 34,  125 => 33,  116 => 11,  109 => 8,  105 => 26,  100 => 25,  97 => 24,  92 => 21,  86 => 19,  82 => 30,  77 => 16,  73 => 24,  68 => 13,  65 => 18,  62 => 11,  57 => 21,  55 => 11,  51 => 11,  46 => 10,  42 => 7,  39 => 6,  36 => 5,  31 => 3,  93 => 45,  83 => 18,  78 => 17,  72 => 16,  64 => 11,  61 => 10,  58 => 9,  53 => 7,  48 => 6,  43 => 5,  38 => 4,  33 => 3,);
    }
}
