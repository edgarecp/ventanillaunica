<?php

/* GeneralComunBundle:KnpPaginatorBundle:sortable_link.html.twig */
class __TwigTemplate_aa38d35d7d40900b5b67271bd89d3aa4 extends Twig_Template
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
        echo "<a ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
        foreach ($context['_seq'] as $context["attr"] => $context["value"]) {
            echo " ";
            echo twig_escape_filter($this->env, (isset($context["attr"]) ? $context["attr"] : null), "html", null, true);
            echo "=\"";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
            echo "\"";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attr'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo ">
";
        // line 2
        if (($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "class") == "asc")) {
            echo "<span class=\"ui-icon ui-icon-circle-arrow-n\"></span>";
        }
        // line 3
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "
";
        // line 4
        if (($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "class") == "desc")) {
            echo "<span class=\"ui-icon ui-icon-circle-arrow-s\"></span>";
        }
        // line 5
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:KnpPaginatorBundle:sortable_link.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 38,  103 => 33,  86 => 27,  84 => 26,  80 => 24,  74 => 23,  68 => 21,  53 => 17,  38 => 11,  32 => 9,  22 => 3,  72 => 17,  63 => 13,  57 => 18,  51 => 11,  47 => 5,  45 => 8,  30 => 8,  24 => 4,  21 => 2,  19 => 1,  268 => 42,  260 => 40,  257 => 39,  250 => 38,  244 => 37,  241 => 36,  238 => 35,  234 => 45,  231 => 44,  228 => 35,  225 => 34,  222 => 33,  216 => 27,  211 => 26,  206 => 63,  202 => 61,  196 => 60,  192 => 59,  189 => 58,  185 => 56,  182 => 55,  179 => 54,  174 => 53,  171 => 52,  169 => 51,  165 => 49,  136 => 48,  121 => 46,  119 => 33,  114 => 32,  97 => 31,  92 => 29,  87 => 27,  85 => 26,  75 => 23,  69 => 20,  65 => 18,  62 => 17,  60 => 19,  49 => 15,  43 => 4,  41 => 12,  39 => 3,  37 => 5,  35 => 2,  33 => 6,  29 => 4,  27 => 3,  25 => 2,  23 => 1,  156 => 22,  154 => 21,  148 => 20,  142 => 19,  138 => 18,  134 => 17,  130 => 16,  123 => 15,  120 => 14,  112 => 12,  107 => 11,  101 => 10,  95 => 30,  89 => 8,  83 => 7,  81 => 25,  78 => 24,  31 => 5,  28 => 3,);
    }
}
