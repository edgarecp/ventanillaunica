<?php

/* GeneralComunBundle:Public:_show.html.twig */
class __TwigTemplate_97638d0b7d9d7887a5874484439d7b53 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'titulo' => array($this, 'block_titulo'),
            'datos' => array($this, 'block_datos'),
            'transacciones' => array($this, 'block_transacciones'),
            'datosTrans' => array($this, 'block_datosTrans'),
            'adicionar' => array($this, 'block_adicionar'),
            'acciones' => array($this, 'block_acciones'),
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
        $context["tit"] = (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "tit"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "tit"), "method"), twig_capitalize_string_filter($this->env, (isset($context["rut"]) ? $context["rut"] : null)))) : (twig_capitalize_string_filter($this->env, (isset($context["rut"]) ? $context["rut"] : null))));
        // line 11
        echo "
<div class=\"grid_10 prefix_3\">
    <br />
    <fieldset>
        <legend>MOSTRAR (";
        // line 15
        $this->displayBlock('titulo', $context, $blocks);
        echo ")</legend>
        <table class='show'>
            <tbody>
                <tr><th>Id</th><td>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
        echo "</td></tr>
                ";
        // line 19
        $this->displayBlock('datos', $context, $blocks);
        // line 20
        echo "            </tbody>
        </table>
    </fieldset>
</div><div class='clear'></div>

";
        // line 25
        $this->displayBlock('transacciones', $context, $blocks);
        // line 40
        echo "
";
        // line 41
        $this->displayBlock('adicionar', $context, $blocks);
        // line 42
        echo "
";
        // line 43
        $this->displayBlock('acciones', $context, $blocks);
    }

    // line 15
    public function block_titulo($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["tit"]) ? $context["tit"] : null), "html", null, true);
    }

    // line 19
    public function block_datos($context, array $blocks = array())
    {
    }

    // line 25
    public function block_transacciones($context, array $blocks = array())
    {
        // line 26
        echo "    ";
        if ((((array_key_exists("cantTrans", $context)) ? (_twig_default_filter((isset($context["cantTrans"]) ? $context["cantTrans"] : null), 0)) : (0)) == 0)) {
            // line 27
            echo "        &nbsp;
    ";
        } else {
            // line 29
            echo "        <br />
        <div class=\"grid_5 prefix_5\">
            <fieldset>
                <legend>TRANSACCIONES</legend>
                <table class='show2'>
                    <tbody>";
            // line 34
            $this->displayBlock('datosTrans', $context, $blocks);
            echo "</tbody>
                </table>
            </fieldset>
        </div><div class='clear'></div>
    ";
        }
    }

    public function block_datosTrans($context, array $blocks = array())
    {
    }

    // line 41
    public function block_adicionar($context, array $blocks = array())
    {
    }

    // line 43
    public function block_acciones($context, array $blocks = array())
    {
        // line 44
        echo "    <div class=\"grid_3\">";
        if (((isset($context["vBtnVol"]) ? $context["vBtnVol"] : null) == "S")) {
            echo "<center><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_listado"), array("ord" => (isset($context["ord"]) ? $context["ord"] : null), "orddir" => (isset($context["orddir"]) ? $context["orddir"] : null))), "html", null, true);
            echo "\" class='btn_ga'>Volver al listado</a></center>";
        }
        echo "&nbsp;</div>
    <div class=\"grid_10\">
        <center>
        ";
        // line 47
        if (((isset($context["vBtnNew"]) ? $context["vBtnNew"] : null) == "S")) {
            echo "<a href=\"";
            echo $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_new"));
            echo "\" class='btn'>Crear Nuevo</a>";
        }
        // line 48
        echo "        ";
        if (((isset($context["vBtnMod"]) ? $context["vBtnMod"] : null) == "S")) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_edit"), array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"))), "html", null, true);
            echo "\" class='btn_gm'>Modificar</a>";
        }
        // line 49
        echo "        ";
        if (((isset($context["vBtnImp"]) ? $context["vBtnImp"] : null) == "S")) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_imprimir"), array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"))), "html", null, true);
            echo "\" class='btnGPrn'>Imprimir</a>";
        }
        // line 50
        echo "        ";
        $this->displayBlock('adicionarBtn', $context, $blocks);
        // line 51
        echo "        </center>
    </div>
    ";
        // line 53
        if (((isset($context["cantTrans"]) ? $context["cantTrans"] : null) == 0)) {
            // line 54
            echo "    <div class=\"grid_2\">
        <center>
        ";
            // line 56
            if (((isset($context["vBtnDel"]) ? $context["vBtnDel"] : null) == "S")) {
                echo "<a href=\"#\" onclick=\"confirmDelete('";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_delete"), array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"))), "html", null, true);
                echo "', ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
                echo " );\" class='btn_gb'>Borrar</a>";
            }
            // line 57
            echo "        </center>
    </div>
    ";
        }
        // line 60
        echo "    <div class='clear'></div>
";
    }

    // line 50
    public function block_adicionarBtn($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:Public:_show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 50,  192 => 60,  187 => 57,  179 => 56,  175 => 54,  173 => 53,  169 => 51,  166 => 50,  159 => 49,  152 => 48,  146 => 47,  135 => 44,  132 => 43,  127 => 41,  113 => 34,  106 => 29,  102 => 27,  99 => 26,  96 => 25,  91 => 19,  85 => 15,  81 => 43,  78 => 42,  76 => 41,  73 => 40,  71 => 25,  64 => 20,  62 => 19,  58 => 18,  52 => 15,  46 => 11,  40 => 8,  38 => 7,  36 => 6,  32 => 4,  30 => 3,  26 => 1,  182 => 26,  176 => 24,  174 => 23,  170 => 22,  165 => 21,  162 => 20,  116 => 16,  112 => 14,  109 => 13,  107 => 12,  104 => 11,  101 => 10,  98 => 9,  92 => 7,  44 => 10,  42 => 9,  39 => 18,  37 => 6,  34 => 5,  31 => 4,  28 => 2,);
    }
}
