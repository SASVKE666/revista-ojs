# Tema PARDALIS (estilo Laborex) para OJS 3.3

Tema hijo del tema **Default** de OJS 3.3, con look de plataforma científica moderna
(azul real, turquesa y menta) inspirado en la plantilla *Laborex* y adaptado a la revista PARDALIS
de la UAN. **No modifica el núcleo de OJS ni el tema Default**: para volver al diseño original
basta con activar "Default".

## Qué contiene

| Archivo | Para qué sirve |
|---|---|
| `index.php`, `version.xml` | Registro del plugin en OJS |
| `PardalisThemePlugin.inc.php` | Hereda de Default, carga fuentes/estilos, calcula los datos de la portada y **vacía solo la caché de CSS cuando cambian los archivos del tema** |
| `styles/custom.less` | Todo el diseño. La paleta está en la sección 1 (`@blue`, `@teal`, `@navy`…) |
| `templates/frontend/components/header.tpl` | Franja superior (logo, correo, afiliación, botón de envío) + barra de menú |
| `templates/frontend/components/footer.tpl` | Pie oscuro con enlaces e ISSN |
| `templates/frontend/pages/indexJournal.tpl` | Portada: hero, tarjetas, sobre la revista, estadísticas, artículos recientes, número actual, llamado a enviar |
| `templates/frontend/pages/search.tpl` | Búsqueda: barra grande, filtros plegables, contador, consejos y estado vacío |
| (en `custom.less`, sección 3b) | La navegación (menú, submenús, hamburguesa, enlaces de salto) no depende del CSS base del Default: se ve bien aunque ese CSS no cargue |
| `styles/colors.less` | Sin uso (de una versión anterior); se puede borrar |

## Instalación (Laragon)

1. Reemplaza la carpeta `revista-ojs/plugins/themes/pardalisTheme` por esta (debe existir `.../pardalisTheme/index.php`).
2. **Ajustes del sitio → Apariencia → Tema**: elige "PARDALIS (estilo Laborex)".
3. Recarga con Ctrl+F5. La primera carga tarda un poco: el tema limpia y recompila el CSS.
   Si aun así ves la página sin estilos, borra los `.css` de `revista-ojs/cache/` y la carpeta `cache/t_compile`.

> **Por qué importa la caché:** OJS guarda el CSS compilado por *nombre* (`1-stylesheet-….css`) y solo
> comprueba que el archivo exista. Un CSS viejo de otro tema se sigue sirviendo y deja la página "sin estilos".
> El tema ya lo detecta y limpia solo, pero ese es el primer lugar donde mirar si algo se ve raro.

## De dónde sale cada cosa de la portada

- Nombre, ISSN, correo y afiliación: **Ajustes de la revista** (Información / Contacto).
- Texto del hero y de "Sobre la revista": **resumen de la revista**.
- Portada del hero: imagen de portada del **número actual** (si no hay, una genérica).
- Fondo del hero: la *imagen de la página de inicio*, si la subes.
- Chips de áreas: **secciones**. Cifras y artículos recientes: se calculan solos.
- Textos fijos de las tarjetas y del llamado a enviar: están en español en `indexJournal.tpl`.

## Notas

- El botón "Nuevo envío" lleva al asistente de envío de OJS. Es el panel de administración (no lo cambia ningún tema de portada); es el comportamiento normal.
- La portada ocupa todo el ancho y no muestra barra lateral; las páginas interiores conservan su estructura.
- Si algo falla, desactiva el tema (activa Default) y revisa el `error_log` de PHP: los datos dinámicos están protegidos con `try/catch`.
- Fuentes (Poppins, Inter) desde Google Fonts; sin internet se usa una sans-serif genérica.
