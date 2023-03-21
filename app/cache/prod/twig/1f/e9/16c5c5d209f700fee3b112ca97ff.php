<?php

/* CpsFludocAdmBundle:Derivacion:new.html.twig */
class __TwigTemplate_1fe916c5c5d209f700fee3b112ca97ff extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_oJScYCss($context, array $blocks = array())
    {
        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/select2/select2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>  
    <script type=\"text/javascript\" src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/generalcomun/select2/select2.min.js"), "html", null, true);
        echo "\"></script>
";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'stylesheet');
        echo $this->env->getExtension('genemu.twig.extension.form')->renderJavascript((isset($context["form"]) ? $context["form"] : null));
    }

    // line 8
    public function block_cuerpo($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        $context["ruta"] = "adm_derivacion";
        // line 10
        echo "    ";
        $context["tit"] = "Documentacion Recibida";
        // line 11
        echo "
    ";
        // line 12
        $this->env->loadTemplate("CpsFludocAdmBundle:Derivacion:new.html.twig", "858293036")->display($context);
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Derivacion:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 12,  55 => 11,  52 => 10,  49 => 9,  46 => 8,  41 => 6,  37 => 5,  32 => 4,  29 => 3,);
    }
}


/* CpsFludocAdmBundle:Derivacion:new.html.twig */
class __TwigTemplate_1fe916c5c5d209f700fee3b112ca97ff_858293036 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GeneralComunBundle:Public:_show.html.twig");

        $this->blocks = array(
            'datos' => array($this, 'block_datos'),
            'transacciones' => array($this, 'block_transacciones'),
            'acciones' => array($this, 'block_acciones'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GeneralComunBundle:Public:_show.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_datos($context, array $blocks = array())
    {
        $this->env->loadTemplate("CpsFludocAdmBundle:Docrec:_show.html.twig")->display($context);
    }

    // line 14
    public function block_transacciones($context, array $blocks = array())
    {
        // line 15
        echo "            ";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "derivaciones")) > 0)) {
            // line 16
            echo "                <br>
                ";
            // line 17
            $this->env->loadTemplate("CpsFludocAdmBundle:Derivacion:_listado.html.twig")->display($context);
            // line 18
            echo "            ";
        }
        // line 19
        echo "            <br>            
            ";
        // line 20
        $this->env->loadTemplate("CpsFludocAdmBundle:Derivacion:_new.html.twig")->display($context);
        // line 21
        echo "        ";
    }

    // line 22
    public function block_acciones($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Derivacion:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 22,  130 => 21,  128 => 20,  125 => 19,  122 => 18,  120 => 17,  117 => 16,  114 => 15,  111 => 14,  105 => 13,  58 => 12,  55 => 11,  52 => 10,  49 => 9,  46 => 8,  41 => 6,  37 => 5,  32 => 4,  29 => 3,);
    }
}
