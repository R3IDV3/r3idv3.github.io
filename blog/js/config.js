$(function() {

	CMS.init({

		// Name of your site or location of logo file ,relative to root directory (img/logo.png)
		siteName: 'eggplant',

		// Tagline for your site
		siteTagline: 'BLOG',

		// Email address
		siteEmail: 'reid.vender@me.com',

		// Name
		siteAuthor: 'Reid Vender',

		// Navigation items
		siteNavItems: [
			{ name: 'Home', href: 'http://eggplant.me', newWindow: false}
		],

		// Posts folder name
		postsFolder: 'blog/posts',

		// Homepage posts snippet length
		postSnippetLength: 120,

		// Pages folder name
		pagesFolder: 'blog/pages',

		// Site fade speed
		fadeSpeed: 300,

		// Site footer text
		footerText: '&copy; ' + new Date().getFullYear() + ' All Rights Reserved.',

		// Mode 'Github' for Github Pages, 'Apache' for Apache server. Defaults
		// to Github
		mode: 'Github',

		// If Github mode is set, your Github username and repo name. Defaults
		// to Github pages branch (gh-pages)
		githubUserSettings: {
			username: 'r3idv3',
			repo: 'r3idv3.github.io'
		}

	});

	// Markdown settings
	marked.setOptions({
		renderer: new marked.Renderer(),
		gfm: true,
		tables: true,
		breaks: false,
		pedantic: false,
		sanitize: true,
		smartLists: true,
		smartypants: false
	});

});
