<?php

/* core/modules/file/templates/file-managed-file.html.twig */
class __TwigTemplate_b8886fb6b1c93a650915a123719cf2243ac676e40de2db126dfdb40ed79bf7e7 extends Twig_Template
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
        // line 15
        echo "<div";
        echo twig_drupal_escape_filter($this->env, (isset($context["attributes"]) ? $context["attributes"] : null), "html", null, true);
        echo ">
  ";
        // line 16
        echo twig_drupal_escape_filter($this->env, (isset($context["element"]) ? $context["element"] : null), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/file/templates/file-managed-file.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 16,  19 => 15,);
    }
}
