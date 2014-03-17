<?php

/* ::layout.html.twig */
class __TwigTemplate_e4d9008ef04ff4c781ae21b06e7c221787b78417e52f056e597e54b3bb243479 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
    <head>
\t<meta charset=\"utf-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"shortcut icon\" href=\"images/favicon.ico\" type=\"image/x-icon\">
        <link rel=\"icon\" type=\"image/png\" href=\"images/favicon.png\" />
        
        ";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 12
        echo "        
        ";
        // line 13
        $this->displayBlock('javascripts', $context, $blocks);
        // line 17
        echo "        
    </head>
    <body>
\t    ";
        // line 20
        $this->displayBlock('body', $context, $blocks);
        // line 21
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Newsroom";
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "            <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" />
        ";
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        echo "            <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-1.11.0.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/app.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    // line 20
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  86 => 20,  80 => 15,  75 => 14,  72 => 13,  65 => 10,  62 => 9,  56 => 5,  50 => 21,  48 => 20,  43 => 17,  41 => 13,  38 => 12,  36 => 9,  29 => 5,  23 => 1,);
    }
}
