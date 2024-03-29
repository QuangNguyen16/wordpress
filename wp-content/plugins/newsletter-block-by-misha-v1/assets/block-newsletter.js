( function( blocks, element ) {

	const el = element.createElement;

	//const { RichText } = editor;
	const { registerBlockType } = blocks;



	const iconEmail = el('svg', { width: 20, height: 20 },
		el( 'path',
			{
				d: "M19.833 1.127c-0.144-0.129-0.349-0.163-0.527-0.088l-19 8c-0.192 0.081-0.314 0.272-0.306 0.48s0.144 0.389 0.342 0.455l5.658 1.886v5.64c0 0.212 0.133 0.4 0.333 0.471 0.055 0.019 0.111 0.029 0.167 0.029 0.148 0 0.291-0.066 0.388-0.185l2.763-3.401 4.497 4.441c0.095 0.094 0.221 0.144 0.351 0.144 0.042 0 0.084-0.005 0.125-0.016 0.17-0.044 0.305-0.174 0.355-0.343l5-17c0.055-0.185-0.003-0.385-0.147-0.514zM16.13 3.461l-9.724 7.48-4.488-1.496 14.212-5.984zM7 11.746l9.415-7.242-7.194 8.854c-0 0-0 0.001-0.001 0.001l-2.22 2.733v-4.346zM14.256 17.557l-3.972-3.922 8.033-9.887-4.061 13.808z"
			}
		)
	);


	registerBlockType( 'misha/newsletter', {
		title: 'Newsletter',
		icon: iconEmail,
		category: 'widgets',
		keywords: [ 'email', 'subscribe', 'misha' ],

		// The "edit" property must be a valid function.
		edit: function( props ) {
			return (
				el( 'div', { className: props.className },
					el( 'div', { className: 'misha-block-form-wrap' },
						el( 'div', {},
							'Enter your email address'
						),
						el( 'div', {},
							'Subscribe'
						)
					)
				)
			);
		},

		save: function( props ) {
			return (
				el( 'div', { className: props.className },
					el( 'form', { className: 'misha-block-form-wrap' },
						el( 'input', { 'type': 'email', 'placeholder' : 'Enter your email address' } ),
						el( 'button', {}, 'Subscribe' )
					)
				)
			);
		},
	} );
} )(
	window.wp.blocks,
	window.wp.element,
);
