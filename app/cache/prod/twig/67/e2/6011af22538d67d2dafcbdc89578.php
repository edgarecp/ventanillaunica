<?php

/* GeneralComunBundle:KnpPaginatorBundle:sliding.html.twig */
class __TwigTemplate_67e26011af22538d67d2dafcbdc89578 extends Twig_Template
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
        // line 2
        echo "
";
        // line 3
        if (((isset($context["pageCount"]) ? $context["pageCount"] : null) > 1)) {
            // line 4
            echo "<div class=\"pagination\">
<table class=\"sinBorde\">
    <tr>
        <td width=\"12%\">
    ";
            // line 8
            if ((array_key_exists("first", $context) && ((isset($context["current"]) ? $context["current"] : null) != (isset($context["first"]) ? $context["first"] : null)))) {
                // line 9
                echo "        <span class=\"first\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["first"]) ? $context["first"] : null)))), "html", null, true);
                echo "\" >&lt;&lt;</a></span>
    ";
            }
            // line 11
            echo "
    ";
            // line 12
            if (array_key_exists("previous", $context)) {
                // line 13
                echo "        <span class=\"previous\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["previous"]) ? $context["previous"] : null)))), "html", null, true);
                echo "\" >&lt;</a></span>
    ";
            }
            // line 15
            echo "    
        </td><td align=\"center\" width=\"76%\">
    ";
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagesInRange"]) ? $context["pagesInRange"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 18
                echo "        ";
                if (((isset($context["page"]) ? $context["page"] : null) != (isset($context["current"]) ? $context["current"] : null))) {
                    // line 19
                    echo "            <span class=\"page\"><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["page"]) ? $context["page"] : null)))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, (isset($context["page"]) ? $context["page"] : null), "html", null, true);
                    echo "</a></span>
        ";
                } else {
                    // line 21
                    echo "            <span class=\"current\">";
                    echo twig_escape_filter($this->env, (isset($context["page"]) ? $context["page"] : null), "html", null, true);
                    echo "</span>
        ";
                }
                // line 23
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "        </td><td width=\"12%\">
        
    ";
            // line 26
            if (array_key_exists("next", $context)) {
                // line 27
                echo "        <span class=\"next\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["next"]) ? $context["next"] : null)))), "html", null, true);
                echo "\" >&gt;</a></span>
    ";
            }
            // line 29
            echo "
    ";
            // line 30
            if ((array_key_exists("last", $context) && ((isset($context["current"]) ? $context["current"] : null) != (isset($context["last"]) ? $context["last"] : null)))) {
                // line 31
                echo "        <span class=\"last\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["last"]) ? $context["last"] : null)))), "html", null, true);
                echo "\" >&gt;&gt;</a></span>
    ";
            }
            // line 33
            echo "        </td>
    </tr>
</table>     
</div>
";
        } else {
            // line 38
            echo "    &nbsp;
";
        }
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:KnpPaginatorBundle:sliding.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 38,  103 => 33,  86 => 27,  84 => 26,  80 => 24,  74 => 23,  68 => 21,  53 => 17,  38 => 11,  32 => 9,  22 => 3,  72 => 17,  63 => 13,  57 => 18,  51 => 11,  47 => 9,  45 => 8,  30 => 8,  24 => 4,  21 => 2,  19 => 2,  268 => 42,  260 => 40,  257 => 39,  250 => 38,  244 => 37,  241 => 36,  238 => 35,  234 => 45,  231 => 44,  228 => 35,  225 => 34,  222 => 33,  216 => 27,  211 => 26,  206 => 63,  202 => 61,  196 => 60,  192 => 59,  189 => 58,  185 => 56,  182 => 55,  179 => 54,  174 => 53,  171 => 52,  169 => 51,  165 => 49,  136 => 48,  121 => 46,  119 => 33,  114 => 32,  97 => 31,  92 => 29,  87 => 27,  85 => 26,  75 => 23,  69 => 20,  65 => 18,  62 => 17,  60 => 19,  49 => 15,  43 => 13,  41 => 12,  39 => 9,  37 => 5,  35 => 7,  33 => 6,  29 => 4,  27 => 3,  25 => 2,  23 => 1,  156 => 22,  154 => 21,  148 => 20,  142 => 19,  138 => 18,  134 => 17,  130 => 16,  123 => 15,  120 => 14,  112 => 12,  107 => 11,  101 => 10,  95 => 30,  89 => 8,  83 => 7,  81 => 25,  78 => 24,  31 => 5,  28 => 3,);
    }
}
