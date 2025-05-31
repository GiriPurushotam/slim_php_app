<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* invoice/index.twig */
class __TwigTemplate_65dd4e77a8c670c04ad30839484b7990 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">

\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t\t<title>Document</title>
\t</head>

\t<body>
\t\t<style>
\t\t\ttable {
\t\t\t\twidth: 100%;
\t\t\t\tborder-collapse: collapse;
\t\t\t\ttext-align: center;
\t\t\t}

\t\t\ttable tr th,
\t\t\ttable tr td {
\t\t\t\tborder: 1px #eee solid;
\t\t\t\tpadding: 5px;
\t\t\t}

\t\t\t.color-green {
\t\t\t\tcolor: green;
\t\t\t}

\t\t\t.color-red {
\t\t\t\tcolor: red;
\t\t\t}

\t\t\t.color-grey {
\t\t\t\tcolor: grey;
\t\t\t}

\t\t\t.color-orange {
\t\t\t\tcolor: orange;
\t\t\t}
\t\t</style>
\t\t<center>
\t\t\t<h1>Hello from view Index</h1>
\t\t</center>

\t\t<table>
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th>Invoice #</th>
\t\t\t\t\t<th>Amount</th>
\t\t\t\t\t<th>Status</th>
\t\t\t\t\t<th>Due Date</th>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["testInvoices"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["testInvoice"]) {
            // line 55
            yield "
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>";
            // line 57
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["testInvoice"], "invoiceNumber", [], "any", false, false, false, 57), "html", null, true);
            yield "</td>
\t\t\t\t\t\t<td>";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extra\Intl\IntlExtension']->formatCurrency(CoreExtension::getAttribute($this->env, $this->source, $context["testInvoice"], "amount", [], "any", false, false, false, 58), "USD"), "html", null, true);
            yield "</td>
\t\t\t\t\t\t<td>";
            // line 59
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["testInvoice"], "status", [], "any", false, false, false, 59), "value", [], "any", false, false, false, 59), "html", null, true);
            yield "</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t";
            // line 61
            yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["testInvoice"], "dueDate", [], "any", false, false, false, 61))) ? ("N/A") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["testInvoice"], "dueDate", [], "any", false, false, false, 61), "m/d/Y"), "html", null, true)));
            yield "
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
            $context['_iterated'] = true;
        }
        // line 64
        if (!$context['_iterated']) {
            // line 65
            yield "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td colspan=\"4\">No Invoices Found
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['testInvoice'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        yield "
\t\t\t</tbody>
\t\t</table>
\t</body>

</html>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "invoice/index.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  139 => 70,  129 => 65,  127 => 64,  119 => 61,  114 => 59,  110 => 58,  106 => 57,  102 => 55,  97 => 54,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "invoice/index.twig", "/var/www/views/invoice/index.twig");
    }
}
