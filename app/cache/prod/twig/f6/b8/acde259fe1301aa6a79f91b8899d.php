<?php

/* GeneralComunBundle:Main:_noticias.html.twig */
class __TwigTemplate_f6b8acde259fe1301aa6a79f91b8899d extends Twig_Template
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
        echo "    <br />        
    <fieldset>
        <legend>Noticias</legend>
        ";
        // line 4
        if (((isset($context["entitiesN"]) ? $context["entitiesN"] : null) == null)) {
            // line 5
            echo "            <center><h1>No existen Noticias...</h1></center>
        ";
        } else {
            // line 7
            echo "        <div id=\"accordion\">
            ";
            // line 8
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["entitiesN"]) ? $context["entitiesN"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 9
                echo "                <h2>Fecha:&nbsp;";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "creadoEl"), "d/m/Y"), "html", null, true);
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Autor:&nbsp;";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "usuario"), "html", null, true);
                echo "</h2>
                <div>";
                // line 10
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "descripcion"), "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo "        </div>
        ";
        }
        // line 14
        echo "    </fieldset>
";
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:Main:_noticias.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 12,  44 => 10,  24 => 4,  56 => 14,  51 => 12,  47 => 11,  42 => 9,  38 => 8,  30 => 7,  21 => 2,  163 => 29,  160 => 28,  155 => 27,  148 => 26,  141 => 25,  136 => 24,  133 => 23,  128 => 22,  118 => 20,  115 => 19,  105 => 17,  98 => 16,  95 => 15,  88 => 14,  85 => 13,  78 => 12,  75 => 11,  68 => 10,  63 => 9,  60 => 15,  48 => 6,  43 => 5,  40 => 4,  33 => 8,  19 => 1,  166 => 76,  164 => 75,  162 => 74,  158 => 72,  150 => 67,  144 => 66,  140 => 65,  134 => 61,  129 => 59,  121 => 21,  116 => 53,  110 => 51,  108 => 18,  104 => 49,  94 => 42,  87 => 37,  84 => 36,  59 => 14,  55 => 7,  50 => 11,  46 => 10,  41 => 8,  37 => 9,  34 => 7,  31 => 5,  26 => 5,);
    }
}
