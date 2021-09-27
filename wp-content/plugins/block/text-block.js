/* This section of the code registers a new block, sets an icon
and a category, and indicates what type of fields it'll include.
*/
wp.blocks.registerBlockType('brad/border-box', {
     title: 'Email block',
     icon: 'smiley',
     category: 'common',
     attributes: {
          content: { type: 'string' },
          check: {type: 'Boolean'}
     },
     /* This configures how the content and color fields will work,
     and sets up the necessary elements */

     edit: function (props) {
          function updateContent(event) {
               props.setAttributes({ content: event.target.value })
          }
          const checkEmail = () => {
               if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(props.attributes.content)) {
                    props.setAttributes({
                              check: true
                    })
                    return (true)
               }
               props.setAttributes({
                    check: false,
               })
               alert("Ban da nhap sai dinh dang email");
               return (false)
          }
          return React.createElement(
               "div",
               null,
               React.createElement(
                    "h3",
                    null,
                    "Simple Box"
               ),
               React.createElement("input", {
                    type: "text", value:
                         props.attributes.content, onChange: updateContent
               }),
               React.createElement("button", {
                    type: "button",
                    onClick:checkEmail
               }, 'button'),
          );
     },
     save: function (props) {
          return wp.element.createElement(
               "h3",
               {
                    style: { border: "3px solid " + props.attributes.color }
               },
               props.attributes.content
          );
     }
})