const { createHigherOrderComponent } = wp.compose;
const { Fragment, useEffect, useState } = wp.element;
const { InspectorControls } = wp.blockEditor;
const { PanelBody, SelectControl } = wp.components;


/**
 * Add Custom Select to Image Sidebar
 */
const withRick = createHigherOrderComponent( ( BlockEdit ) => {
    return ( props ) => {
        const [rando, setRando] = useState(0);
        function getRandomInt(max) {
            return Math.floor(Math.random() * max);
          }
        
        useEffect(()=>{
            setRando(getRandomInt(10));
        }, []);
    	if ( rando < 9) {
            return (
                <BlockEdit { ...props } />
            );
        }

        return (
            <Fragment>
              <iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ?start=17&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </Fragment>
        );
    };
}, 'withRick' );

wp.hooks.addFilter(
    'editor.BlockEdit',
    'forte-press/with-rick',
    withRick
);
