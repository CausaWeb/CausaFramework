<title>{{ $title }}</title>
<section>
	<h1>CAUSA FRAMEWORK</h1>
	<p>Micro-framework inspirado en Laravel (con algo de NextJS y Angular) para sitios web impulsados por API y microservices.</p>
	<p>Soporta <b>Blade</b> como motor de plantillas.</p>
	<p>Enrutamiento ultra rápido con <b>nikic/fast-route</b>, sintaxis similar a Laravel.</p>
	<p>Potenciado con <b>HTMX</b> → olvídate de recargas completas de página. Navegación rápida, confiable y SSR desde el primer momento.</p>
	<p>Funciona en <b>PHP 7.9+</b>, ideal para proyectos en hosting económicos (Hostinger, MiHosting, etc.)</p>
	<p>Puedes incluir <b>AlpineJS</b> o cualquier otra librería JS para una experiencia de usuario moderna y fluida.</p>
	<p>Protección <b>CSRF</b> integrada → todas tus peticiones HTMX están seguras por defecto gracias a un middleware global.</p>
	<p>Composer obligatorio en desarrollo porque estamos en 2025.</p>
</section>

<section>
	<h2>v1.0.1:</h2>
	<p>Pasamos de Gulp a <b>Vite</b> para tener Live Reload (igual que Laravel)</p>
	<p>Levanta el servidor PHP + recarga en vivo con un solo comando:</p>
	<pre><code>npm run dev</code></pre>
</section>

<section>
	<h2>v1.0.2:</h2>
	<p>Aquí comenzó la magia:</p>
	<p>Agregamos comandos CLI personalizados para desarrollo ultrarrápido:</p>
	<div class="indented">
		<pre><code>php cli make:page &lt;page_route&gt;</code></pre>
		<p>ejemplo:</p>
		<pre><code>php cli make:page {{ $page }}</code></pre>
	</div>
	<ol class="indented">
		<li>1. Crea la vista Blade en: <code>./src/views/pages/{{ $page }}.blade.php</code></li>
		<li>2. Crea el controllador: <code>./src/app/Http/Controllers/{{ $controllerName }}Controller.php</code></li>
		<li>3. Agrega automáticamente la vista GET '<code>/{{ $page }}</code>' en <code>./src/routes/web.php</code> que es manejado por '<code>{{ $controllerName }}Controller.php</code>'</li>
		<li>4. Listo, visita: <code>{{ $appUrl }}/{{ $page }}</code>, y ya funciona.</li>
	</ol>

	<p>Cuando necesites solo determinados archivos (vista o controlador) puedes usar:</p>
	<div class="indented">
		<pre><code>php cli make:view &lt;view_name&gt;</code></pre>
		<p>ejemplo:</p>
		<pre><code>php cli make:view {{ $page }}</code></pre>
	</div>
	<ol class="indented">
		<li>Crea un archivo Blade en: <code>./src/views/pages/{{ $page }}.blade.php</code> que puedes personalizar rápidamente.</li>
	</ol>

	<p>Y cuando solo necesites un controlador:</p>
	<div class="indented">
		<pre><code>php cli make:controller &lt;controller_name&gt;</code></pre>
		<p>ejemplo:</p>
		<pre><code>php cli make:page {{ $controllerName }}</code></pre>
	</div>
	<ol class="indented">
		<li>Tendrás un controlador en: <code>./src/app/Http/Controllers/{{ $controllerName }}Controller.php</code> con contenido por defecto que puedes eliminar sin esfuerzo.</li>
	</ol>
</section>

<section>
	<h2>v1.0.3:</h2>
	<p>Se agregó soporte para Tailwind: <code>./src/assets/css/app.css</code> similar a Laravel</p>
	<p>Del mismo modo tienes JS centralizado en: <code>./src/assets/js/app.js</code></p>
	<p>Compilación rápida, como ya estás acostumbrado: <code>npm run build</code></p>
</section>

<section>
	<h2>v1.0.4:</h2>
	<p>Se agregó Guzzle (súper flexible, trabaja sin problemas con PHP 7 en adelante) con un patrón de Endpoint Classes que además soporta caché que puedes manipular según tus necesidades.</p>
	<p>En general trabaja con cualquier API estandarizada, de tal modo que puedas interactuar con tus endpoints de una forma tan simple como: <code>Products::all()</code> para <code>https://tu-api-endpoint/products</code> y <code>Products::find($product['id'])</code> para <code>https://tu-api-endpoint/products/{id}</code>.</p>
	<p>Lo publicamos en GitHub: <a href="https://github.com/CausaWeb/CausaFramework" target="_blank" class="text-blue-400">https://github.com/CausaWeb/CausaFramework</a> 😄👍.</p>
</section>