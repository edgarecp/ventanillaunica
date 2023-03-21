<?php

/* GeneralComunBundle:Public:_showAcc.html.twig */
class __TwigTemplate_c898ad0d16288b7693d14f00edf6d8b9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'adicionarBtn' => array($this, 'block_adicionarBtn'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["ord"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "ord"), "method");
        // line 2
        $context["orddir"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "orddir"), "method");
        // line 3
        $context["vBtnNew"] = ((array_key_exists("btnNew", $context)) ? (_twig_default_filter((isset($context["btnNew"]) ? $context["btnNew"] : null), "S")) : ("S"));
        // line 4
        $context["vBtnMod"] = ((array_key_exists("btnMod", $context)) ? (_twig_default_filter((isset($context["btnMod"]) ? $context["btnMod"] : null), "S")) : ("S"));
        // line 5
        $context["vBtnImp"] = ((array_key_exists("btnImp", $context)) ? (_twig_default_filter((isset($context["btnImp"]) ? $context["btnImp"] : null), "N")) : ("N"));
        // line 6
        $context["vBtnVol"] = ((array_key_exists("btnVol", $context)) ? (_twig_default_filter((isset($context["btnVol"]) ? $context["btnVol"] : null), "S")) : ("S"));
        // line 7
        $context["vBtnDel"] = ((array_key_exists("btnDel", $context)) ? (_twig_default_filter((isset($context["btnDel"]) ? $context["btnDel"] : null), "S")) : ("S"));
        // line 8
        $context["cantTrans"] = ((array_key_exists("cantTrans", $context)) ? (_twig_default_filter((isset($context["cantTrans"]) ? $context["cantTrans"] : null), 0)) : (0));
        // line 9
        $context["rut"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "rut"), "method");
        // line 10
        echo "
<div class=\"grid_3\">";
        // line 11
        if (((isset($context["vBtnVol"]) ? $context["vBtnVol"] : null) == "S")) {
            echo "<center><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_listado"), array("ord" => (isset($context["ord"]) ? $context["ord"] : null), "orddir" => (isset($context["orddir"]) ? $context["orddir"] : null))), "html", null, true);
            echo "\" class='btn_ga'>Volver al listado</a></center>";
        }
        echo "&nbsp;</div>
<div class=\"grid_11\">
    <center>
    ";
        // line 14
        if (((isset($context["vBtnNew"]) ? $context["vBtnNew"] : null) == "S")) {
            echo "<a href=\"";
            echo $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_new"));
            echo "\" class='btn'>Crear Nuevo</a>";
        }
        // line 15
        echo "    ";
        if (((isset($context["vBtnMod"]) ? $context["vBtnMod"] : null) == "S")) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_edit"), array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"))), "html", null, true);
            echo "\" class='btn_gm'>Modificar</a>";
        }
        // line 16
        echo "    ";
        if (((isset($context["vBtnImp"]) ? $context["vBtnImp"] : null) == "S")) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_imprimir"), array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"))), "html", null, true);
            echo "\" class='btnGPrn'>Imprimir</a>";
        }
        // line 17
        echo "    ";
        $this->displayBlock('adicionarBtn', $context, $blocks);
        // line 18
        echo "    </center>
</div>
";
        // line 20
        if (((isset($context["cantTrans"]) ? $context["cantTrans"] : null) == 0)) {
            // line 21
            echo "<div class=\"grid_2\">
    <center>
\t";
            // line 23
            if (((isset($context["vBtnDel"]) ? $context["vBtnDel"] : null) == "S")) {
                echo "<a href=\"#\" onclick=\"confirmDelete('";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_delete"), array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"))), "html", null, true);
                echo "', ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
                echo " );\" class='btn_gb'>Borrar</a>";
            }
            // line 24
            echo "\t</center>
</div>
";
        }
        // line 27
        echo "<div class='clear'></div>
";
    }

    // line 17
    public function block_adicionarBtn($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:Public:_showAcc.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 27,  84 => 23,  80 => 21,  74 => 18,  57 => 15,  51 => 14,  41 => 11,  22 => 2,  20 => 1,  60 => 10,  54 => 9,  48 => 8,  24 => 3,  19 => 1,  197 => 50,  192 => 60,  187 => 57,  179 => 56,  175 => 54,  173 => 53,  169 => 51,  166 => 50,  159 => 49,  152 => 48,  146 => 47,  135 => 44,  132 => 43,  127 => 41,  113 => 34,  106 => 29,  102 => 17,  99 => 26,  96 => 25,  91 => 19,  85 => 15,  81 => 43,  78 => 20,  76 => 41,  73 => 40,  71 => 17,  64 => 16,  62 => 19,  58 => 18,  52 => 15,  46 => 11,  40 => 6,  38 => 10,  36 => 9,  32 => 7,  30 => 6,  26 => 4,  182 => 26,  176 => 24,  174 => 23,  170 => 22,  165 => 21,  162 => 20,  116 => 16,  112 => 14,  109 => 13,  107 => 12,  104 => 11,  101 => 10,  98 => 9,  92 => 24,  44 => 7,  42 => 9,  39 => 18,  37 => 6,  34 => 8,  31 => 4,  28 => 5,);
    }
}
