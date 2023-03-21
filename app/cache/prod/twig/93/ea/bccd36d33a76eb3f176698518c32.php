<?php

/* GeneralComunBundle:Seguridad:login.html.twig */
class __TwigTemplate_93eabccd36d33a76eb3f176698518c32 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GeneralComunBundle::layout.html.twig");

        $this->blocks = array(
            'style' => array($this, 'block_style'),
            'oJQ' => array($this, 'block_oJQ'),
            'header' => array($this, 'block_header'),
            'menu' => array($this, 'block_menu'),
            'footer' => array($this, 'block_footer'),
            'cuerpo' => array($this, 'block_cuerpo'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GeneralComunBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_style($context, array $blocks = array())
    {
    }

    // line 4
    public function block_oJQ($context, array $blocks = array())
    {
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
    }

    // line 6
    public function block_menu($context, array $blocks = array())
    {
    }

    // line 7
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 9
    public function block_cuerpo($context, array $blocks = array())
    {
        // line 10
        echo "<center>
<img src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/imagenes/banner.jpg"), "html", null, true);
        echo "\" alt=\"banner\" />
<br /><br />
<div class=\"grid_6 prefix_5\">
<fieldset>
   <legend>CLAVE DE ACCESO :</legend>
   ";
        // line 16
        if ((isset($context["error"]) ? $context["error"] : null)) {
            echo "<div class='error'>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "message")), "html", null, true);
            echo "</div>";
        }
        // line 17
        echo "    <form action=\"";
        echo $this->env->getExtension('routing')->getPath("logincheck");
        echo "\" method=\"post\">
        <div><label for=\"username\">Usuario:</label> <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" class=\"corto\"/></div>
        <div><label for=\"password\">Contraseña:</label> <input type=\"password\" id=\"password\" name=\"_password\" class=\"corto\"/></div>
        <button type=\"submit\" class='btn'>Entrar</button>
    </form>
</fieldset>
</div><div class=\"clear\"></div>
<br /><br />
<img src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/imagenes/logoPrograma.jpg"), "html", null, true);
        echo "\" width='338' height='272' alt='Programa' />
</center>
";
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:Seguridad:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 25,  83 => 18,  78 => 17,  72 => 16,  64 => 11,  61 => 10,  58 => 9,  53 => 7,  48 => 6,  43 => 5,  38 => 4,  33 => 3,);
    }
}
