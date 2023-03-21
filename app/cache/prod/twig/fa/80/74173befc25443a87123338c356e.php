<?php

/* CpsFludocAdmBundle:Docrec:show.html.twig */
class __TwigTemplate_fa8074173befc25443a87123338c356e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GeneralComunBundle::layout.html.twig");

        $this->blocks = array(
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
    public function block_cuerpo($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["cantTrans"] = twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "derivaciones"));
        // line 5
        echo "
    ";
        // line 6
        $this->env->loadTemplate("CpsFludocAdmBundle:Docrec:show.html.twig", "1945548987")->display($context);
        // line 18
        echo "
    ";
        // line 19
        $this->env->loadTemplate("CpsFludocAdmBundle:Docrec:show.html.twig", "1875801184")->display($context);
        // line 28
        echo "
";
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Docrec:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 28,  42 => 19,  39 => 18,  37 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}


/* CpsFludocAdmBundle:Docrec:show.html.twig */
class __TwigTemplate_fa8074173befc25443a87123338c356e_1945548987 extends Twig_Template
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

    // line 7
    public function block_datos($context, array $blocks = array())
    {
        $this->env->loadTemplate("CpsFludocAdmBundle:Docrec:_show.html.twig")->display($context);
    }

    // line 9
    public function block_transacciones($context, array $blocks = array())
    {
        // line 10
        echo "            ";
        if ((isset($context["cantTrans"]) ? $context["cantTrans"] : null)) {
            // line 11
            echo "                <br>
                ";
            // line 12
            $this->env->loadTemplate("CpsFludocAdmBundle:Derivacion:_listado.html.twig")->display($context);
            // line 13
            echo "            ";
        }
        // line 14
        echo "        ";
    }

    // line 16
    public function block_acciones($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Docrec:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 16,  112 => 14,  109 => 13,  107 => 12,  104 => 11,  101 => 10,  98 => 9,  92 => 7,  44 => 28,  42 => 19,  39 => 18,  37 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}


/* CpsFludocAdmBundle:Docrec:show.html.twig */
class __TwigTemplate_fa8074173befc25443a87123338c356e_1875801184 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GeneralComunBundle:Public:_showAcc.html.twig");

        $this->blocks = array(
            'adicionarBtn' => array($this, 'block_adicionarBtn'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GeneralComunBundle:Public:_showAcc.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 20
    public function block_adicionarBtn($context, array $blocks = array())
    {
        // line 21
        echo "            <a href=\"";
        echo $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_imprimir_hojaruta"));
        echo "\" class='btnGPrn'>Imp-HojaRuta</a>
            <a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_imprimir_colilla"));
        echo "\"  class='btnGPrn'>Imp-Colilla</a>
            ";
        // line 23
        if (((isset($context["cantTrans"]) ? $context["cantTrans"] : null) == 0)) {
            // line 24
            echo "                <a href=\"";
            echo $this->env->getExtension('routing')->getPath("adm_derivacion_new");
            echo "\"  class='btn_gm'>Derivar</a>
            ";
        }
        // line 26
        echo "        ";
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Docrec:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 26,  176 => 24,  174 => 23,  170 => 22,  165 => 21,  162 => 20,  116 => 16,  112 => 14,  109 => 13,  107 => 12,  104 => 11,  101 => 10,  98 => 9,  92 => 7,  44 => 28,  42 => 19,  39 => 18,  37 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
