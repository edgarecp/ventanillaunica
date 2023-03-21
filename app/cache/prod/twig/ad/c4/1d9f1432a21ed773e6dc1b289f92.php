<?php

/* CpsFludocAdmBundle:Docrec:imprimircolilla.html.twig */
class __TwigTemplate_adc41d9f1432a21ed773e6dc1b289f92 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GeneralComunBundle::blanco.html.twig");

        $this->blocks = array(
            'cuerpo' => array($this, 'block_cuerpo'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GeneralComunBundle::blanco.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_cuerpo($context, array $blocks = array())
    {
        // line 3
        echo "<br />
Revisa el estado de tu documentacion en la pagina web: www.cps.com.bo/ventanillaunica, ingresando el Codigo y el PIN
<br /><br />
";
        // line 6
        $this->env->loadTemplate("CpsFludocAdmBundle:Publico:_docrec.html.twig")->display(array_merge($context, array("colilla" => true)));
        // line 7
        echo "<br />
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
";
        // line 9
        echo "   
";
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Docrec:imprimircolilla.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 9,  38 => 7,  36 => 6,  31 => 3,  28 => 2,);
    }
}
