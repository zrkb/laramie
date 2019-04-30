

// Editor Js
// https://github.com/editor-js/header
const Header = require('@editorjs/header');

// https://github.com/editor-js/link
const LinkTool = require('@editorjs/link');

// https://github.com/editor-js/raw
const RawTool = require('@editorjs/raw');

// https://github.com/editor-js/simple-image
const SimpleImage = require('@editorjs/simple-image');

// https://github.com/editor-js/image
const ImageTool = require('@editorjs/image');

// https://github.com/editor-js/checklist
const Checklist = require('@editorjs/checklist');

// https://github.com/editor-js/list
const List = require('@editorjs/list');

// https://github.com/editor-js/embed
const Embed = require('@editorjs/embed');

// https://github.com/editor-js/quote
const Quote = require('@editorjs/quote');

// https://github.com/codex-team/codex.shortcuts
const Shortcut = require('@codexteam/shortcuts');

var editorHolder = document.getElementById('codex-editors');

if (editorHolder) {
	const editor = new EditorJS({
		holder: 'codex-editors',

		/** 
		* Available Tools list. 
		* Pass Tool's class or Settings object for each Tool you want to use 
		*/ 
		tools: {
			'paragraph': {
				config: {
					placeholder: ''
				}
			},
			'header': {
				class: Header,
				shortcut: 'CMD+SHIFT+H',
				config: {
					placeholder: 'Enter a header',
				}
			},
			// 'linkTool': {
			// 	class: LinkTool,
			// 	// https://github.com/editor-js/link#server-format
			// 	// config: {
			// 	// 	endpoint: 'http://localhost:8008/fetchUrl', // Your backend endpoint for url data fetching
			// 	// }
			// },
			'raw': RawTool,
			'simplmage': SimpleImage,
			'image': {
				class: ImageTool,
				config: {
					endpoints: {
						byFile: 'http://localhost:8008/uploadFile', // Your backend file uploader endpoint
						byUrl: 'http://localhost:8008/fetchUrl', // Your endpoint that provides uploading by Url
					}
				}
			},
			'checklist': {
				class: Checklist,
				inlineToolbar: true,
			},
			'list': {
				class: List,
				inlineToolbar: true,
			},
			'embed': {
				class: Embed,
				inlineToolbar: true,
				config: {
					services: {
						'youtube': true,
						'coub': true,
						// 'codepen': true,
						'codepen': {
							regex: /https?:\/\/codepen.io\/([^\/\?\&]*)\/pen\/([^\/\?\&]*)/,
							embedUrl: 'https://codepen.io/<%= remote_id %>?height=300&theme-id=0&default-tab=css,result&embed-version=2',
							html: "<iframe height='300' scrolling='no' frameborder='no' allowtransparency='true' allowfullscreen='true' style='width: 100%;'></iframe>",
							height: 300,
							width: 600,
							id: (groups) => groups.join('/embed/')
						},
						'imgur': true,
						'gfycat': true,
						'twitch-video': true,
						'twitch-channel': true,
						'vimeo': true,
						'vine': true,
						'yandex-music-track': true,
						'yandex-music-album': true,
					}
				},
			},
			// 'quote': {
			// 	class: Quote,
			// 	inlineToolbar: true,
			// 	shortcut: 'CMD+SHIFT+O',
			// 	config: {
			// 		quotePlaceholder: 'Enter a quote',
			// 		captionPlaceholder: 'Quote\'s author',
			// 	},
			// },
		},
	});
} // endif