# Causa Framework

<section>
  <p>En peruano <b>"causa"</b> significa amigo, alguien en quien confías. Es un nombre que refleja el propósito de este proyecto: construir un framework confiable y práctico.</p>
  <p>Inspirado por <b>Laravel</b>, con toques de <b>NextJS</b> y <b>Angular</b>, nació con la idea de servir para proyectos de en hostings modestos que no te permiten ejecutar Laravel o hacer un deploy de Node.</p>
</section>

---

<section>
  <h1>🚀 Características</h1>
  <p>Micro-framework inspirado en Laravel (con algo de NextJS y Angular) para sitios web impulsados por API y microservicios.</p>
  <ul>
    <li>Motor de plantillas <b>Blade</b></li>
    <li>Enrutamiento ultra rápido con <b>nikic/fast-route</b></li>
    <li>Potenciado con <b>HTMX</b> → navegación rápida y SSR desde el inicio</li>
    <li>Compatible con <b>PHP 7.9+</b>, ideal para hostings económicos</li>
    <li>Integración opcional con <b>AlpineJS</b> u otras librerías modernas</li>
    <li>Protección <b>CSRF</b> integrada</li>
    <li>Compilación con <b>Vite</b> y soporte para <b>TailwindCSS</b></li>
    <li>CLI propio para generar páginas, vistas y controladores en segundos</li>
    <li>Soporte para APIs con <b>Guzzle</b> y clases de endpoint con caché</li>
  </ul>
</section>

---

<section>
<h1>📖 Características generales</h1>
  
<p>Soporta Blade como motor de plantillas.</p>

<p>Enrutamiento ultra rápido con nikic/fast-route, sintaxis similar a Laravel.</p>

<p>Potenciado con HTMX → olvídate de recargas completas de página. Navegación rápida, confiable y SSR desde el primer momento.</p>

<p>Funciona en PHP 7.9 en adelante, ideal para proyectos en hostings económicos (Hostinger, MiHosting, etc.) o aquellos que solo soportan WordPress.</p>

<p>Puedes incluir AlpineJS, GSAP, Swiper o cualquier otra librería JS modular para una experiencia de usuario moderna y fluida.</p>

<p>Protección CSRF integrada → todas tus peticiones HTMX están seguras por defecto gracias a un middleware global.</p>

<p>Composer obligatorio en desarrollo porque estamos en 2025.</p>

<p>Soporta <b>Vite</b> para tener Live Reload, Tailwind y procesar tus archivos JS.</p>

<p>Lanza el servidor PHP y Vite con un solo comando:</p>

<pre><code>npm run dev</code></pre>

<p>Genera tu CSS y JS para producción con el conocido comando:</p>

<pre><code>npm run build</code></pre>

<p>CLI personalizado para crear páginas, vistas y controladores automáticamente.</p>

<pre><code>php cli make:page &lt;page_route&gt;</code></pre>

<p>Si solo quieres crear un controlador:</p>

<pre><code>php cli make:controller &lt;controller_name&gt;</code></pre>

<p>Y si solo necesitas un view:</p>

<pre><code>php cli make:view &lt;view_name&gt;</code></pre>

<p>Ahora puedes limpiar la caché de Blade con:</p>

<pre><code>php cli cache:clear</code></pre>

<p>Para limpiar la caché de datos API:</p>

<pre><code>php cli cache:clear-api</code></pre>

<p>Y para limpiar la caché de Blade y la de datos API:</p>

<pre><code>php cli cache:clear-all</code></pre>

<p>Ahora pre-integrado con <b>Guzzle</b> y patrón de Endpoint Classes para APIs.</p>

<pre><code>Products::all()</code> → https://tu-api-endpoint/products</pre>
</section>

<section>
  <p>Y como toda aplicación necesita de testing ahora Causa viene con PEST. PEST es de esas librerías que los fans de Laravel disfrutamos de usar. Aunque viene pre-instalada necesita ser inicializada, así que le añadimos 2 nuevos comandos CLI a Causa:</p>

  <pre><code>php cli pest:init</code></pre>

  <p>Que no es más que un alias para inicializar PEST (creará algunos archivos en la carpeta <code>./tests</code>):</p>

  <pre><code>./vendor/bin/pest --init</code></pre>

  <p>Aunque sin duda nuestro comando es más fácil de recordar e intuitivo de usar 😎. Y para ejecutar los tests ahora tienes disponible:</p>

  <pre><code>php cli pest:test</code></pre>

  <p>Que es otro alias 🤓, esta vez de:</p>

  <pre><code>./vendor/bin/pest</code></pre>
</section>
</section>

---

<section>
  <h1>📦 Instalación</h1>
  <p>Clona el repositorio de la forma usual:</p>

  <pre><code>git clone https://github.com/CausaWeb/CausaFramework</code></pre>

  <p>Luego instala las dependencias:</p>
  <pre><code>composer install
npm install
npm run dev</code></pre>

  <p>E inicializa PEST:</p>
  <pre><code>php cli pest:init</code></pre>
</section>

---

<section>
	<h2>Video Tutorial</h2>
	<p>Conoce los fundamentos de cómo funciona <b>Causa 
	Framework</b> viendo este tutorial en YT:</p>


[![Ver tutorial: primeros pasos con Causa Framework](https://img.youtube.com/vi/26i4hfdnT9I/0.jpg)](https://www.youtube.com/watch?v=26i4hfdnT9I)



</section>

---

<section>
  <h1>🤝 Contribuir</h1>
  <p>Pull requests son bienvenidos. Si quieres proponer cambios grandes, abre primero un issue para discutirlo.</p>
</section>

---

<section>
  <h1>📜 Licencia</h1>
  <p>MIT License — libre para usar y modificar.</p>
</section>
