<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bienvenue sur BlitzPHP <?= \BlitzPHP\Core\Application::VERSION ?></title>
	<meta name="description" content="The simplest PHP framework for beginners">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<style {csp-style-nonce}>
		* {
			transition: background-color 300ms ease, color 300ms ease;
		}
		*:focus {
			background-color: rgba(194, 187, 68, .2);
			outline: none;
		}
		html, body {
			color: rgba(33, 37, 41, 1);
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
			font-size: 16px;
			margin: 0;
			padding: 0;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			text-rendering: optimizeLegibility;
		}
		header {
			background-color: rgba(247, 248, 249, 1);
			padding: .4rem 0 0;
		}
		.menu {
			padding: .4rem 2rem;
		}
		header ul {
			border-bottom: 1px solid rgba(242, 242, 242, 1);
			list-style-type: none;
			margin: 0;
			overflow: hidden;
			padding: 0;
			text-align: right;
		}
		header li {
			display: inline-block;
		}
		header li a {
			border-radius: 5px;
			color: rgba(0, 0, 0, .5);
			display: block;
			height: 44px;
			text-decoration: none;
		}
		header li.menu-item a {
			border-radius: 5px;
			margin: 5px 0;
			height: 38px;
			line-height: 36px;
			padding: .4rem .65rem;
			text-align: center;
		}
		header li.menu-item a:hover,
		header li.menu-item a:focus {
			background-color: rgba(194, 187, 68, .2);
			color: rgba(194, 187, 68, 1);
		}
		header .logo {
			float: left;
			height: 44px;
			padding: .4rem .5rem;
		}
		header .menu-toggle {
			display: none;
			float: right;
			font-size: 2rem;
			font-weight: bold;
		}
		header .menu-toggle button {
			background-color: rgba(194, 187, 68, .6);
			border: none;
			border-radius: 3px;
			color: rgba(255, 255, 255, 1);
			cursor: pointer;
			font: inherit;
			font-size: 1.3rem;
			height: 36px;
			padding: 0;
			margin: 11px 0;
			overflow: visible;
			width: 40px;
		}
		header .menu-toggle button:hover,
		header .menu-toggle button:focus {
			background-color: rgba(194, 187, 68, .8);
			color: rgba(255, 255, 255, .8);
		}
		header .heroe {
			margin: 0 auto;
			max-width: 1100px;
			padding: 1rem 1.75rem 1.75rem 1.75rem;
		}
		header .heroe h1 {
			font-size: 2.5rem;
			font-weight: 500;
		}
		header .heroe h2 {
			font-size: 1.5rem;
			font-weight: 300;
		}
		section {
			margin: 0 auto;
			padding: 2.5rem 1.75rem 3.5rem 1.75rem;
        }
		section h1 {
			margin-bottom: 2.5rem;
		}
		section h2 {
			font-size: 120%;
			line-height: 2.5rem;
			padding-top: 1.5rem;
		}
		section pre {
			background-color: rgba(247, 248, 249, 1);
			border: 1px solid rgba(242, 242, 242, 1);
			display: block;
			font-size: .9rem;
			margin: 2rem 0;
			padding: 1rem 1.5rem;
			white-space: pre-wrap;
			word-break: break-all;
		}
		section code {
			display: block;
		}
		section a {
			color: rgba(194, 187, 68, 1);
		}
		section svg {
			margin-bottom: -5px;
			margin-right: 5px;
			width: 25px;
		}
		.further {
			background-color: rgba(247, 248, 249, 1);
			border-bottom: 1px solid rgba(242, 242, 242, 1);
			border-top: 1px solid rgba(242, 242, 242, 1);
		}
		.further h2:first-of-type {
			padding-top: 0;
		}
		footer {
			background-color: rgba(194, 187, 68, .8);
			text-align: center;
		}
		footer .copyrights {
			background-color: rgba(62, 62, 62, 1);
			color: rgba(200, 200, 200, 1);
			padding: .25rem 1.75rem;
		}

        #content {
            display: flex;
            justify-content: space-between;
			align-items: flex-start;
        }
        #content > div {
            flex: 1;
            margin: 0.5em 2em;
        }
        #content > div img {
            width: 100%;
			height: 15em;
        }
		@media (max-width: 559px) {
			#content {
				flex-direction: column;
			}
			header ul {
				padding: 0;
			}
			header .menu-toggle {
				padding: 0 1rem;
			}
			header .menu-item {
				background-color: rgba(244, 245, 246, 1);
				border-top: 1px solid rgba(242, 242, 242, 1);
				margin: 0 15px;
				width: calc(100% - 30px);
			}
			header .menu-toggle {
				display: block;
			}
			header .hidden {
				display: none;
			}
			header li.menu-item a {
				background-color: rgba(194, 187, 68, .1);
			}
			header li.menu-item a:hover,
			header li.menu-item a:focus {
				background-color: rgba(194, 187, 68, .7);
				color: rgba(255, 255, 255, .8);
			}
		}
	</style>
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>

	<div class="menu">
		<ul>
			<li class="logo"><a href="http://blitz-php.byethost14.com" target="_blank">
                <img height="44" title="Visiter le site web officiel de BlitzPHP!" alt="BlitzPHP"
					src="data:image/png;base64,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"
                >
            </a></li>
			<li class="menu-toggle">
				<button onclick="toggleMenu();">&#9776;</button>
			</li>
			<li class="menu-item hidden"><a target="_blank" href="http://blitz-php.byethost14.com/docs/">Docs</a></li>
			<li class="menu-item hidden"><a target="_blank" href="http://blitz-php.byethost14.com/forum">Communauté</a></li>
			<li class="menu-item hidden"><a target="_blank" href="https://github.com/blitz-php/framework/blob/master/CONTRIBUTING.md">Contribuer</a></li>
		</ul>
	</div>

	<div class="heroe">
		<h1>Bienvenue sur BlitzPHP <?= \BlitzPHP\Core\Application::VERSION ?></h1>

		<h2>Un framework simple pour un développement efficace</h2>
	</div>

</header>

<!-- CONTENT -->

<section id="content">
    <div>
        <img alt="BlitzPHP Full Logo" src="data:image/png;base64,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Hb54hdbyYycTeE0e+kw/NTXWPJYMLJw9xz5so3XjwFIhNggUD4G/RbCkKWwpPDRume7Bhoo1a36jCQf228517UDd+T8xaBpoU8Uy9N543XrvTvxHc4GyQ/ziIXDVjRe5m/F4gjVi2uKktKatjFrvDFb7A311tJyij/tEP/n1XBu7rCCAQMkg8LcLlhPDjGnG8utqqGxHGv/hfPUtjRw3Lsl0IUIAgZJCoNg9L/xtaMpFdusJMPy8US8dN84GoQqQG6IXP4G/bY+Vu2kjP6S+J/7Qm/1tMvsAHho92fRfQwCBEkegxAjWvt22rJEfqo4XL9FfviixDyCNnKBbHD9gvmsQAQRKHIESI1hCZsOapD8mTtOd5T0J+QXxARw1kVrt3mb7o8TRRIVAIJtAiRIsqdO3820/zVnA/++wF8dm8QGcMpN6r1qRVOingDECQKA4CZQ4wZLGfvxx0icr1+jx7g0XQZv/Hb0xd1ZSsbxgsTghI+9/HoESKVjSDRM+pQHJv5LrCdN1m/TnY8cmvfnP6yK0GASKgcDXs6y/Tf/UuqEYskaWIPDPJXBLCyPPuwX/uTTQchAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAAARAIisD/ASLUWOUGKmaNAAAAAElFTkSuQmCC" />
        
        <h1>A propos de cette page</h1>

        <p>La page que vous voyez actuellement a été générée dynamiquement par BlitzPHP.</p>

        <p>Si vous voulez éditer cette page, vous la trouverez à l'emplacement</p>

        <pre><code>app/Views/welcome.php</code></pre>

        <p>La définition de la route menant à cette page peut être trouvé dans:</p>

        <pre><code>app/Config/routes.php</code></pre>
    </div>
    <div>
        
        <div class="further">   
            <section>
                <h2>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><rect x='32' y='96' width='64' height='368' rx='16' ry='16' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/><line x1='112' y1='224' x2='240' y2='224' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='112' y1='400' x2='240' y2='400' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><rect x='112' y='160' width='128' height='304' rx='16' ry='16' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/><rect x='256' y='48' width='96' height='416' rx='16' ry='16' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/><path d='M422.46,96.11l-40.4,4.25c-11.12,1.17-19.18,11.57-17.93,23.1l34.92,321.59c1.26,11.53,11.37,20,22.49,18.84l40.4-4.25c11.12-1.17,19.18-11.57,17.93-23.1L445,115C443.69,103.42,433.58,94.94,422.46,96.11Z' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/></svg>
                    Apprendre
                </h2>
                <p>
                    BlitzPHP possède une merveilleuse documentation couvrant tous les aspects du framework. 
                    Que vous soyez un nouveau venu ou que vous ayez une expérience préalable, 
                    nous vous recommandons de lire notre documentation du début à la fin.
                    Consultez la <a href="http://blitz-php.byethost14.com/docs" target="_blank">documentation</a> !
                </p>
                <h2>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M431,320.6c-1-3.6,1.2-8.6,3.3-12.2a33.68,33.68,0,0,1,2.1-3.1A162,162,0,0,0,464,215c.3-92.2-77.5-167-173.7-167C206.4,48,136.4,105.1,120,180.9a160.7,160.7,0,0,0-3.7,34.2c0,92.3,74.8,169.1,171,169.1,15.3,0,35.9-4.6,47.2-7.7s22.5-7.2,25.4-8.3a26.44,26.44,0,0,1,9.3-1.7,26,26,0,0,1,10.1,2L436,388.6a13.52,13.52,0,0,0,3.9,1,8,8,0,0,0,8-8,12.85,12.85,0,0,0-.5-2.7Z' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/><path d='M66.46,232a146.23,146.23,0,0,0,6.39,152.67c2.31,3.49,3.61,6.19,3.21,8s-11.93,61.87-11.93,61.87a8,8,0,0,0,2.71,7.68A8.17,8.17,0,0,0,72,464a7.26,7.26,0,0,0,2.91-.6l56.21-22a15.7,15.7,0,0,1,12,.2c18.94,7.38,39.88,12,60.83,12A159.21,159.21,0,0,0,284,432.11' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/></svg>
                    Discuter
                </h2>
                <p>
                    BlitzPHP est un projet open source ayant plusieurs lieux permettant aux membres de la communauté de se rassembler et d'échanger des idées. 
                    Consultez toutes les discussions sur <a href="http://blitz-php.byethost14.com/forum" target="_blank">notre forum</a> !
                </p>
                <h2>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><line x1='176' y1='48' x2='336' y2='48' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/><line x1='118' y1='304' x2='394' y2='304' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/><path d='M208,48v93.48a64.09,64.09,0,0,1-9.88,34.18L73.21,373.49C48.4,412.78,76.63,464,123.08,464H388.92c46.45,0,74.68-51.22,49.87-90.51L313.87,175.66A64.09,64.09,0,0,1,304,141.48V48' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/></svg>
                    Contribuer
                </h2>
                <p>
                    BlitzPHP est un projet mené par la communauté et accepte les contributions de code et de documentation de la communauté. 
                    Pourquoi ne pas nous rejoindre ?
                </p>
            </section>
        </div>

    </div>
	
</section>


<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
	<div class="copyrights">

		<p>&copy; <?= date('Y') ?> Dimtrov Labs. BlitzPHP est un projet open source distribué sous licence MIT.</p>

	</div>

</footer>

<!-- SCRIPTS -->

<script>
	function toggleMenu() {
		var menuItems = document.getElementsByClassName('menu-item');
		for (var i = 0; i < menuItems.length; i++) {
			var menuItem = menuItems[i];
			menuItem.classList.toggle("hidden");
		}
	}
</script>

<!-- -->

</body>
</html>
