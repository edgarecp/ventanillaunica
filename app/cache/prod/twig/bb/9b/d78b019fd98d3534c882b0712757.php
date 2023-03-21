<?php

/* CpsFludocAdmBundle:Docrec:_show.html.twig */
class __TwigTemplate_bb9bd78b019fd98d3534c882b0712757 extends Twig_Template
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
        echo "            <tr><th>Creacion    </th><td>";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "creadoEl"), "Y-m-d H:i"), "html", null, true);
        echo "    </td></tr>
            <tr><th>Recepcion   </th><td>";
        // line 2
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "recepcionEl"), "Y-m-d H:i"), "html", null, true);
        echo " </td></tr>
            <tr><th>Fechadoc    </th><td>";
        // line 3
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "fechaDoc"), "Y-m-d"), "html", null, true);
        echo "        </td></tr>
            <tr><th>Cite        </th><td>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "cite"), "html", null, true);
        echo "                          </td></tr>
            <tr><th>Referencia  </th><td>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "referencia"), "html", null, true);
        echo "                    </td></tr>
            <tr><th>Remite      </th><td>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "remite"), "html", null, true);
        echo "                        </td></tr>
            <tr><th>Folio       </th><td>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "folio"), "html", null, true);
        echo "                         </td></tr>
            <tr><th>Archivo     </th><td><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((((isset($context["directorio_archivos"]) ? $context["directorio_archivos"] : null) . "Docrec/") . $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "archivo"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "archivo"), "html", null, true);
        echo "</a></td></tr>
            <tr><th>Modificacion</th><td>";
        // line 9
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "modificadoEl")) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "modificadoEl"), "Y-m-d H:i"), "html", null, true);
        }
        echo "</td></tr>
            <tr><th>Ubicacion   </th><td>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "servicioActual"), "html", null, true);
        echo "                </td></tr>
            <tr><th>Estado      </th><td>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "estadoActual"), "html", null, true);
        echo "                  </td></tr>
";
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Docrec:_show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 10,  54 => 9,  48 => 8,  24 => 2,  19 => 1,  197 => 50,  192 => 60,  187 => 57,  179 => 56,  175 => 54,  173 => 53,  169 => 51,  166 => 50,  159 => 49,  152 => 48,  146 => 47,  135 => 44,  132 => 43,  127 => 41,  113 => 34,  106 => 29,  102 => 27,  99 => 26,  96 => 25,  91 => 19,  85 => 15,  81 => 43,  78 => 42,  76 => 41,  73 => 40,  71 => 25,  64 => 11,  62 => 19,  58 => 18,  52 => 15,  46 => 11,  40 => 6,  38 => 7,  36 => 5,  32 => 4,  30 => 3,  26 => 1,  182 => 26,  176 => 24,  174 => 23,  170 => 22,  165 => 21,  162 => 20,  116 => 16,  112 => 14,  109 => 13,  107 => 12,  104 => 11,  101 => 10,  98 => 9,  92 => 7,  44 => 7,  42 => 9,  39 => 18,  37 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
