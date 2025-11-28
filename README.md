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
  <h1>📖 Historia / Evolución</h1>
  
  <h2>v1.0.0</h2>

<p>Soporta Blade como motor de plantillas.</p>

<p>Enrutamiento ultra rápido con nikic/fast-route, sintaxis similar a Laravel.</p>

<p>Potenciado con HTMX → olvídate de recargas completas de página. Navegación rápida, confiable y SSR desde el primer momento.</p>

<p>Funciona en PHP 7.9 en adelante, ideal para proyectos en hosting económicos (Hostinger, MiHosting, etc.)</p>

<p>Puedes incluir AlpineJS o cualquier otra librería JS para una experiencia de usuario moderna y fluida.</p>

<p>Protección CSRF integrada → todas tus peticiones HTMX están seguras por defecto gracias a un middleware global.</p>

<p>Composer obligatorio en desarrollo porque estamos en 2025.</p>


  <h2>v1.0.1</h2>
  <p>Pasamos de Gulp a <b>Vite</b> para tener Live Reload.</p>
  <p>Ahora puedes lanzar el servidor PHP y Vite con un solo comando:</p>
  <pre><code>npm run dev</code></pre>

  <h2>v1.0.2</h2>
  <p>CLI personalizado para crear páginas, vistas y controladores automáticamente.</p>
  <pre><code>php cli make:page &lt;page_route&gt;</code></pre>
  <p>Si solo quieres crear un controlador:</p>
  <pre><code>php cli make:controller &lt;controller_name&gt;</code></pre>
  <p>Y si solo necesitas un view:</p>
  <pre><code>php cli make:view &lt;view_name&gt;</code></pre>

  <h2>v1.0.3</h2>
  <p>Soporte para <b>TailwindCSS</b> y JS centralizado.</p>
  <pre><code>npm run build</code></pre>

  <h2>v1.0.4</h2>
  <p>Integración con <b>Guzzle</b> y patrón de Endpoint Classes para APIs.</p>
  <pre><code>Products::all()</code> → https://tu-api-endpoint/products</pre>
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
