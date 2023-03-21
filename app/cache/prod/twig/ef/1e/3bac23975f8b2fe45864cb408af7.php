<?php

/* CpsFludocAdmBundle:Publico:_docrec.html.twig */
class __TwigTemplate_ef1e3bac23975f8b2fe45864cb408af7 extends Twig_Template
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
        echo "<table border='1' width='100%'>
   <tr>
      <td width='10%'><b>Codigo</b></td>
      ";
        // line 4
        if ((isset($context["colilla"]) ? $context["colilla"] : null)) {
            // line 5
            echo "      <td width='40%'>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
            echo "</td>      
      <td><b>Pin</b></td>
      <td>";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "Pin"), "html", null, true);
            echo "</td>
      ";
        } else {
            // line 9
            echo "      <td colspan='3' width='40%'>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
            echo "</td>
      ";
        }
        // line 11
        echo "   </tr><tr>
      <td width='10%'><b>Recepcion</b></td>
      <td width='40%'>";
        // line 13
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "recepcionEl"), "d/m/Y H:i"), "html", null, true);
        echo "</td>
      <td width='10%'><b>Cite</b></td>
      <td width='40%'>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "Cite"), "html", null, true);
        echo "</td>
   </tr><tr>
      <td><b>Referencia</b></td>
      <td colspan='3'>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "referencia"), "html", null, true);
        echo "</td>
   </tr><tr>
      <td><b>Remite</b></td>
      <td>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "remite"), "html", null, true);
        echo "</td>
      <td><b>Folio</b></td>
      <td>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "folio"), "html", null, true);
        echo " hoja(s)</td>
   </tr>
</table>
";
    }

    public function getTemplateName()
    {
        return "CpsFludocAdmBundle:Publico:_docrec.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 23,  64 => 21,  58 => 18,  52 => 15,  43 => 11,  32 => 7,  26 => 5,  24 => 4,  68 => 25,  63 => 23,  54 => 17,  50 => 16,  37 => 9,  25 => 4,  21 => 2,  19 => 1,  66 => 12,  61 => 8,  56 => 4,  49 => 13,  47 => 13,  40 => 8,  27 => 5,  22 => 1,  78 => 35,  76 => 34,  70 => 30,  42 => 10,  38 => 6,  35 => 7,  33 => 7,  31 => 5,  28 => 2,);
    }
}
