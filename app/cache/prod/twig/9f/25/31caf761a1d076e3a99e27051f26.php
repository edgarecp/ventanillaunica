<?php

/* GeneralComunBundle:Public:_showDet.html.twig */
class __TwigTemplate_9f2531caf761a1d076e3a99e27051f26 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'titulos' => array($this, 'block_titulos'),
            'datos' => array($this, 'block_datos'),
            'acciones' => array($this, 'block_acciones'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<table class='index'>
    <thead><tr>";
        // line 2
        $this->displayBlock('titulos', $context, $blocks);
        echo "</tr></thead>
    <tbody>";
        // line 3
        $this->displayBlock('datos', $context, $blocks);
        echo "</tbody>
</table>
";
        // line 5
        $this->displayBlock('acciones', $context, $blocks);
    }

    // line 2
    public function block_titulos($context, array $blocks = array())
    {
    }

    // line 3
    public function block_datos($context, array $blocks = array())
    {
    }

    // line 5
    public function block_acciones($context, array $blocks = array())
    {
        $this->env->loadTemplate("GeneralComunBundle:Public:_showAcc.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:Public:_showDet.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  48 => 5,  43 => 3,  38 => 2,  34 => 5,  29 => 3,  25 => 2,  22 => 1,  184 => 39,  167 => 36,  158 => 33,  154 => 32,  149 => 30,  145 => 28,  141 => 27,  136 => 24,  128 => 22,  126 => 21,  119 => 20,  115 => 19,  111 => 18,  107 => 17,  103 => 16,  99 => 15,  96 => 14,  78 => 13,  75 => 12,  64 => 3,  61 => 2,  19 => 1,);
    }
}
