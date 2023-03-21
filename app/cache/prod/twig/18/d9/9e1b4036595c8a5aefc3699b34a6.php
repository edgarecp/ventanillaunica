<?php

/* GeneralComunBundle:Public:_new.html.twig */
class __TwigTemplate_18d99e1b4036595c8a5aefc3699b34a6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'titulo' => array($this, 'block_titulo'),
            'form' => array($this, 'block_form'),
            'datos' => array($this, 'block_datos'),
            'btnVolver' => array($this, 'block_btnVolver'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["ord"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "ord"), "method");
        // line 2
        $context["orddir"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "orddir"), "method");
        // line 3
        $context["vtam"] = ((array_key_exists("tam", $context)) ? (_twig_default_filter((isset($context["tam"]) ? $context["tam"] : null), 0)) : (0));
        // line 4
        $context["rut"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "rut"), "method");
        // line 5
        $context["tit"] = (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "tit"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "tit"), "method"), twig_capitalize_string_filter($this->env, (isset($context["rut"]) ? $context["rut"] : null)))) : (twig_capitalize_string_filter($this->env, (isset($context["rut"]) ? $context["rut"] : null))));
        // line 6
        echo "
";
        // line 7
        if (((isset($context["vtam"]) ? $context["vtam"] : null) == 0)) {
            // line 8
            echo "    <div class=\"grid_16\">
";
        } else {
            // line 10
            echo "    <div class=\"grid_";
            echo twig_escape_filter($this->env, (isset($context["vtam"]) ? $context["vtam"] : null), "html", null, true);
            echo " prefix_";
            echo twig_escape_filter($this->env, ((16 - (isset($context["vtam"]) ? $context["vtam"] : null)) / 2), "html", null, true);
            echo "\">
";
        }
        // line 11
        echo "  
<br />
<fieldset>
    <legend>";
        // line 14
        echo ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id") == null)) ? ("Nuevo") : ("Modificar"));
        echo " (";
        $this->displayBlock('titulo', $context, $blocks);
        echo ")</legend>
";
        // line 15
        $this->displayBlock('form', $context, $blocks);
        // line 18
        echo "\t\t<div>
\t\t\t<div class='error'>";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "</div>
\t\t\t";
        // line 20
        $this->displayBlock('datos', $context, $blocks);
        // line 21
        echo "\t\t</div>
        ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
\t\t<center><button type=\"submit\" class='btn'>Grabar</button></center>
\t</form>
</fieldset>
</div><div class=\"clear\"></div>
";
        // line 27
        $this->displayBlock('btnVolver', $context, $blocks);
        // line 28
        if ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id") != null) && (((array_key_exists("cantTrans", $context)) ? (_twig_default_filter((isset($context["cantTrans"]) ? $context["cantTrans"] : null), 0)) : (0)) == 0))) {
            // line 29
            echo "    <div class=\"grid_3 prefix_10\">
        <center><a href=\"#\" onclick=\"confirmDelete('";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_delete"), array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"))), "html", null, true);
            echo "', ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
            echo " );\" class='btn_gb'>BORRAR</a></center>
    </div>
";
        }
        // line 33
        echo "<div class=\"clear\"></div>
";
    }

    // line 14
    public function block_titulo($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["tit"]) ? $context["tit"] : null), "html", null, true);
    }

    // line 15
    public function block_form($context, array $blocks = array())
    {
        // line 16
        echo "\t<form action=\"";
        echo ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id") == null)) ? ($this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_create"))) : ($this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_update"))));
        echo "\" method=\"POST\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
;
        echo ">
";
    }

    // line 20
    public function block_datos($context, array $blocks = array())
    {
    }

    // line 27
    public function block_btnVolver($context, array $blocks = array())
    {
        echo "<div class=\"grid_3\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["rut"]) ? $context["rut"] : null) . "_listado"), array("ord" => (isset($context["ord"]) ? $context["ord"] : null), "orddir" => (isset($context["orddir"]) ? $context["orddir"] : null))), "html", null, true);
        echo "\" class='btn_ga'>Volver al listado</a></div>";
    }

    public function getTemplateName()
    {
        return "GeneralComunBundle:Public:_new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 14,  36 => 7,  31 => 5,  23 => 1,  1352 => 388,  1343 => 387,  1341 => 386,  1338 => 385,  1322 => 381,  1315 => 380,  1313 => 379,  1310 => 378,  1287 => 374,  1262 => 373,  1260 => 372,  1257 => 371,  1245 => 366,  1240 => 365,  1238 => 364,  1235 => 363,  1226 => 357,  1220 => 355,  1217 => 354,  1212 => 353,  1210 => 352,  1207 => 351,  1200 => 346,  1191 => 344,  1187 => 343,  1184 => 342,  1181 => 341,  1179 => 340,  1176 => 339,  1168 => 335,  1166 => 334,  1163 => 333,  1157 => 329,  1151 => 327,  1146 => 325,  1143 => 324,  1134 => 319,  1132 => 318,  1109 => 317,  1106 => 316,  1100 => 314,  1097 => 313,  1091 => 311,  1089 => 310,  1086 => 309,  1079 => 305,  1070 => 303,  1065 => 301,  1055 => 295,  1047 => 290,  1044 => 289,  1042 => 288,  1031 => 282,  1027 => 281,  1023 => 280,  1020 => 279,  1015 => 277,  1007 => 273,  1005 => 269,  1003 => 268,  1000 => 267,  995 => 263,  970 => 257,  967 => 256,  964 => 255,  961 => 254,  958 => 253,  955 => 252,  949 => 250,  943 => 248,  941 => 247,  938 => 246,  927 => 239,  925 => 238,  922 => 237,  914 => 233,  909 => 231,  885 => 223,  867 => 215,  856 => 210,  851 => 208,  848 => 207,  840 => 203,  835 => 201,  832 => 200,  824 => 196,  821 => 195,  808 => 189,  805 => 188,  803 => 187,  800 => 186,  792 => 182,  789 => 181,  787 => 180,  784 => 179,  776 => 175,  774 => 174,  771 => 173,  763 => 169,  760 => 168,  758 => 167,  755 => 166,  747 => 162,  744 => 161,  740 => 159,  737 => 158,  730 => 153,  720 => 152,  715 => 151,  712 => 150,  706 => 148,  703 => 147,  701 => 146,  690 => 139,  688 => 138,  686 => 136,  685 => 135,  680 => 134,  674 => 132,  671 => 131,  669 => 130,  666 => 129,  653 => 122,  645 => 120,  640 => 119,  634 => 117,  631 => 116,  629 => 115,  626 => 114,  610 => 110,  605 => 108,  589 => 104,  587 => 103,  584 => 102,  555 => 96,  546 => 92,  541 => 91,  538 => 90,  515 => 87,  506 => 82,  494 => 78,  492 => 77,  484 => 75,  469 => 71,  456 => 68,  437 => 61,  433 => 60,  426 => 58,  414 => 52,  408 => 50,  405 => 49,  403 => 48,  400 => 47,  377 => 37,  374 => 36,  366 => 33,  363 => 32,  355 => 27,  337 => 22,  311 => 14,  308 => 13,  299 => 8,  290 => 5,  285 => 3,  276 => 378,  273 => 377,  271 => 371,  268 => 370,  266 => 363,  225 => 295,  222 => 294,  220 => 287,  217 => 286,  215 => 277,  212 => 276,  207 => 266,  204 => 264,  197 => 246,  191 => 243,  189 => 237,  184 => 230,  181 => 229,  179 => 221,  176 => 220,  174 => 214,  159 => 193,  154 => 186,  151 => 185,  149 => 179,  146 => 178,  141 => 172,  126 => 144,  121 => 128,  106 => 101,  101 => 86,  96 => 67,  86 => 46,  81 => 40,  71 => 19,  66 => 19,  61 => 15,  517 => 168,  508 => 164,  500 => 80,  493 => 158,  491 => 157,  489 => 156,  482 => 153,  480 => 152,  477 => 151,  467 => 144,  462 => 142,  459 => 69,  450 => 64,  446 => 138,  442 => 62,  431 => 135,  428 => 59,  422 => 132,  419 => 131,  416 => 130,  413 => 129,  410 => 128,  407 => 127,  404 => 126,  401 => 125,  396 => 123,  391 => 121,  383 => 118,  373 => 115,  371 => 35,  362 => 109,  353 => 107,  349 => 106,  344 => 24,  339 => 103,  309 => 93,  301 => 90,  293 => 6,  288 => 4,  283 => 82,  281 => 385,  278 => 384,  269 => 75,  261 => 72,  259 => 71,  256 => 70,  248 => 333,  245 => 332,  243 => 324,  240 => 323,  232 => 56,  229 => 55,  226 => 54,  224 => 53,  218 => 51,  216 => 50,  213 => 49,  206 => 45,  186 => 236,  183 => 35,  180 => 34,  177 => 33,  175 => 32,  169 => 207,  167 => 27,  166 => 206,  161 => 199,  152 => 22,  147 => 20,  130 => 10,  128 => 9,  125 => 8,  118 => 4,  105 => 2,  90 => 30,  85 => 28,  83 => 27,  80 => 112,  78 => 103,  75 => 22,  73 => 90,  70 => 20,  68 => 80,  65 => 79,  58 => 60,  53 => 49,  48 => 42,  43 => 20,  38 => 8,  33 => 6,  1317 => 662,  1314 => 661,  1308 => 664,  1306 => 661,  1301 => 659,  1297 => 657,  1294 => 656,  1288 => 648,  1284 => 646,  1277 => 642,  1273 => 641,  1267 => 638,  1263 => 637,  1259 => 636,  1255 => 634,  1253 => 633,  1232 => 615,  1224 => 610,  1214 => 603,  1202 => 594,  1153 => 550,  1150 => 549,  1148 => 326,  1112 => 515,  1105 => 510,  1103 => 315,  1094 => 312,  1090 => 498,  1085 => 496,  1081 => 495,  1078 => 494,  1075 => 304,  1068 => 302,  1066 => 493,  1062 => 492,  1058 => 296,  1056 => 489,  1053 => 488,  1039 => 287,  1033 => 468,  1018 => 278,  1016 => 454,  999 => 440,  996 => 439,  992 => 437,  982 => 431,  980 => 430,  973 => 258,  971 => 420,  965 => 417,  962 => 416,  959 => 415,  952 => 251,  950 => 415,  946 => 249,  942 => 412,  940 => 411,  937 => 410,  930 => 240,  923 => 400,  921 => 399,  916 => 397,  911 => 232,  906 => 230,  903 => 391,  900 => 390,  897 => 389,  894 => 226,  891 => 225,  888 => 224,  886 => 384,  883 => 222,  880 => 221,  877 => 381,  875 => 380,  872 => 217,  869 => 216,  866 => 377,  864 => 214,  861 => 375,  858 => 374,  855 => 373,  853 => 209,  850 => 371,  847 => 370,  844 => 369,  841 => 368,  839 => 367,  837 => 202,  834 => 365,  827 => 357,  823 => 356,  819 => 194,  816 => 193,  813 => 353,  806 => 360,  804 => 353,  799 => 351,  795 => 349,  793 => 348,  790 => 347,  783 => 342,  777 => 338,  775 => 337,  770 => 334,  764 => 332,  756 => 327,  753 => 326,  751 => 325,  746 => 323,  742 => 160,  738 => 320,  736 => 319,  733 => 318,  726 => 313,  716 => 305,  714 => 304,  711 => 303,  700 => 294,  698 => 145,  693 => 290,  687 => 137,  681 => 287,  678 => 286,  673 => 285,  670 => 284,  662 => 279,  659 => 278,  657 => 123,  649 => 121,  644 => 268,  632 => 258,  630 => 257,  621 => 251,  617 => 250,  613 => 248,  611 => 247,  608 => 109,  598 => 238,  592 => 237,  586 => 236,  583 => 235,  578 => 234,  575 => 233,  569 => 231,  567 => 98,  558 => 224,  554 => 223,  551 => 222,  548 => 93,  545 => 220,  542 => 219,  539 => 218,  536 => 217,  533 => 216,  531 => 215,  525 => 211,  520 => 89,  518 => 88,  511 => 203,  507 => 202,  503 => 81,  501 => 199,  498 => 198,  487 => 76,  483 => 190,  481 => 74,  478 => 188,  471 => 72,  461 => 70,  445 => 163,  443 => 162,  438 => 160,  429 => 154,  425 => 133,  423 => 57,  420 => 150,  411 => 144,  402 => 138,  398 => 124,  394 => 136,  390 => 43,  388 => 42,  385 => 41,  379 => 117,  368 => 34,  364 => 115,  359 => 114,  357 => 113,  350 => 26,  346 => 110,  342 => 23,  338 => 107,  335 => 21,  332 => 20,  330 => 98,  327 => 103,  324 => 95,  321 => 99,  319 => 98,  316 => 16,  313 => 15,  306 => 92,  304 => 91,  296 => 94,  291 => 91,  289 => 90,  286 => 89,  279 => 84,  263 => 362,  258 => 351,  255 => 350,  250 => 338,  247 => 64,  244 => 60,  241 => 59,  238 => 309,  235 => 308,  233 => 301,  230 => 300,  209 => 39,  201 => 44,  199 => 262,  196 => 42,  178 => 18,  168 => 28,  162 => 11,  156 => 192,  144 => 173,  137 => 2,  127 => 27,  124 => 129,  119 => 114,  117 => 410,  114 => 108,  109 => 15,  107 => 3,  104 => 87,  99 => 68,  97 => 246,  94 => 57,  92 => 198,  89 => 47,  87 => 29,  84 => 41,  79 => 32,  77 => 132,  74 => 20,  72 => 21,  69 => 13,  67 => 53,  62 => 33,  49 => 10,  44 => 8,  284 => 128,  280 => 127,  274 => 80,  267 => 74,  260 => 360,  253 => 339,  246 => 108,  239 => 104,  227 => 298,  223 => 94,  210 => 267,  202 => 263,  194 => 245,  188 => 71,  173 => 15,  165 => 56,  158 => 52,  155 => 23,  153 => 50,  139 => 166,  134 => 158,  131 => 157,  116 => 113,  112 => 16,  102 => 1,  98 => 33,  95 => 167,  93 => 162,  91 => 56,  88 => 151,  82 => 150,  76 => 31,  64 => 3,  59 => 32,  57 => 13,  54 => 12,  47 => 9,  40 => 19,  37 => 12,  35 => 7,  32 => 10,  30 => 9,  27 => 3,  25 => 2,  171 => 213,  164 => 200,  157 => 22,  150 => 21,  143 => 20,  136 => 165,  129 => 145,  122 => 20,  115 => 16,  111 => 107,  108 => 13,  63 => 18,  60 => 69,  55 => 14,  52 => 11,  50 => 11,  45 => 41,  42 => 10,  39 => 5,  29 => 4,);
    }
}
