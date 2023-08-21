<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* core/themes/olivero/templates/content/comment.html.twig */
class __TwigTemplate_8dbe7e0ee9aea4e67c4dc69d91c99d8771b11e9dd3d91d6f6bfc98077993371d extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 68
        $context["classes"] = [0 => "comment", 1 => "js-comment", 2 => (( !        // line 71
($context["parent_comment"] ?? null)) ? ("comment--level-1") : ("")), 3 => (((        // line 72
($context["status"] ?? null) != "published")) ? (("comment--" . $this->sandbox->ensureToStringAllowed(($context["status"] ?? null), 72, $this->source))) : ("")), 4 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 73
($context["comment"] ?? null), "owner", [], "any", false, false, true, 73), "anonymous", [], "any", false, false, true, 73)) ? ("by-anonymous") : ("")), 5 => (((        // line 74
($context["author_id"] ?? null) && (($context["author_id"] ?? null) == twig_get_attribute($this->env, $this->source, ($context["commented_entity"] ?? null), "getOwnerId", [], "method", false, false, true, 74)))) ? ((("by-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["commented_entity"] ?? null), "getEntityTypeId", [], "method", false, false, true, 74), 74, $this->source)) . "-author")) : (""))];
        // line 77
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("olivero/comments"), "html", null, true);
        echo "
<article ";
        // line 78
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 78), "setAttribute", [0 => "role", 1 => "article"], "method", false, false, true, 78), "setAttribute", [0 => "data-drupal-selector", 1 => "comment"], "method", false, false, true, 78), 78, $this->source), "html", null, true);
        echo ">
  ";
        // line 84
        echo "  <span class=\"hidden\" data-comment-timestamp=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["new_indicator_timestamp"] ?? null), 84, $this->source), "html", null, true);
        echo "\"></span>

  <div class=\"comment__picture-wrapper\">
    <div class=\"comment__picture\">
      ";
        // line 88
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["user_picture"] ?? null), 88, $this->source), "html", null, true);
        echo "
    </div>
  </div>
  <div class=\"comment__text-wrapper\">
    <footer class=\"comment__meta\">
      <p class=\"comment__author\">";
        // line 93
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author"] ?? null), 93, $this->source), "html", null, true);
        echo "</p>
      <p class=\"comment__time\">";
        // line 94
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["created"] ?? null), 94, $this->source), "html", null, true);
        echo "</p>
      ";
        // line 100
        echo "      ";
        if (($context["parent"] ?? null)) {
            // line 101
            echo "        <p class=\"visually-hidden\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["parent"] ?? null), 101, $this->source), "html", null, true);
            echo "</p>
      ";
        }
        // line 103
        echo "    </footer>
    <div";
        // line 104
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => "comment__content"], "method", false, false, true, 104), 104, $this->source), "html", null, true);
        echo ">
      ";
        // line 105
        if (($context["title"] ?? null)) {
            // line 106
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 106, $this->source), "html", null, true);
            echo "
        <h3";
            // line 107
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 107, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 107, $this->source), "html", null, true);
            echo "</h3>
        ";
            // line 108
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 108, $this->source), "html", null, true);
            echo "
      ";
        }
        // line 110
        echo "      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 110, $this->source), "html", null, true);
        echo "
    </div>
  </div>
</article>
";
    }

    public function getTemplateName()
    {
        return "core/themes/olivero/templates/content/comment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 110,  106 => 108,  100 => 107,  95 => 106,  93 => 105,  89 => 104,  86 => 103,  80 => 101,  77 => 100,  73 => 94,  69 => 93,  61 => 88,  53 => 84,  49 => 78,  45 => 77,  43 => 74,  42 => 73,  41 => 72,  40 => 71,  39 => 68,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/olivero/templates/content/comment.html.twig", "/var/www/html/web/core/themes/olivero/templates/content/comment.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 68, "if" => 100);
        static $filters = array("escape" => 77);
        static $functions = array("attach_library" => 77);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
                ['attach_library']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
