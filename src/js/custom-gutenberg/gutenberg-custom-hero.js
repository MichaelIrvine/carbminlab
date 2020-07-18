const { registerBlockType } = wp.blocks;
const {
  RichText,
  InspectorControls,
  ColorPalette,
  MediaUpload,
} = wp.blockEditor;
const { PanelBody, Button, RangeControl } = wp.components;

registerBlockType('carbminlab/custom-hero', {
  title: 'Full Screen Hero Section',
  description: 'Custom Hero Section',
  category: 'layout',
  icon: 'cover-image',
  attributes: {
    headerIcon: {
      type: 'string',
      default: null,
    },
    heading: {
      type: 'string',
      source: 'html',
      selector: 'h2',
    },
    headingColor: {
      type: 'string',
      default: '#000000',
    },
    text: {
      type: 'string',
      source: 'html',
      selector: 'h3',
    },
    textColor: {
      type: 'string',
      default: '#000000',
    },
    backgroundImage: {
      type: 'string',
      default: null,
    },
    overlayColor: {
      type: 'string',
      default: '#000000',
    },
    overlayOpacity: {
      type: 'number',
      default: 0.25,
    },
  },
  edit({ attributes, setAttributes }) {
    const {
      headerIcon,
      heading,
      headingColor,
      text,
      textColor,
      backgroundImage,
      overlayColor,
      overlayOpacity,
    } = attributes;

    function onChangeHeading(newHeading) {
      setAttributes({ heading: newHeading });
    }

    function onHeadingColorChange(newColor) {
      setAttributes({ headingColor: newColor });
    }

    function onChangeText(newText) {
      setAttributes({ text: newText });
    }

    function onTextColorChange(newText) {
      setAttributes({ textColor: newText });
    }

    function onSelectImage(newImage) {
      setAttributes({ backgroundImage: newImage.sizes.full.url });
    }

    function onSelectHeaderIcon(newImage) {
      setAttributes({ headerIcon: newImage.sizes.full.url });
    }

    function onOverlayColorChange(newOverlayColor) {
      setAttributes({ overlayColor: newOverlayColor });
    }

    function onOverlayOpacityChange(newOpacity) {
      setAttributes({ overlayOpacity: newOpacity });
    }

    return [
      <InspectorControls style={{ marginBottom: '40px' }}>
        <PanelBody title={'Font Color Settings'}>
          <p>
            <strong>Select Font Color: </strong>
          </p>
          <ColorPalette value={headingColor} onChange={onHeadingColorChange} />
          <ColorPalette value={textColor} onChange={onTextColorChange} />
        </PanelBody>
        <PanelBody title={'Background Image Settings'}>
          <p>
            <strong>Select a background image: </strong>
          </p>
          <MediaUpload
            onSelect={onSelectImage}
            type='image'
            value={backgroundImage}
            render={({ open }) => (
              <Button
                onClick={open}
                icon='upload'
                className='editor-media-placeholder__button is-button is-default'
              >
                Background Image
              </Button>
            )}
          />
          <div style={{ margin: '20px 0 40px 0' }}>
            <strong>Overlay Color: </strong>
            <ColorPalette
              value={overlayColor}
              onChange={onOverlayColorChange}
            ></ColorPalette>
          </div>
          <RangeControl
            label={'Overlay Opacity'}
            value={overlayOpacity}
            onChange={onOverlayOpacityChange}
            min={0}
            max={1}
            step={0.05}
          />
        </PanelBody>
        <PanelBody title={'Heading Icon or Logo '}>
          <p>
            <strong>Select an image for an icon or logo: </strong>
          </p>
          <MediaUpload
            onSelect={onSelectHeaderIcon}
            type='image'
            value={headerIcon}
            render={({ open }) => (
              <Button
                onClick={open}
                icon='upload'
                className='editor-media-placeholder__button is-button is-default'
              >
                Heading Icon
              </Button>
            )}
          />
        </PanelBody>
      </InspectorControls>,

      <div
        className='full-screen-hero__container'
        style={{
          backgroundImage: `url(${backgroundImage})`,
        }}
      >
        <div
          className='full-screen-hero__overlay'
          style={{
            background: overlayColor,
            opacity: overlayOpacity,
          }}
        ></div>
        <div className='full-screen-hero__text-container'>
          <div className='full-screen-hero__icon-container'>
            <img src={headerIcon} />
          </div>
          <RichText
            className='full-screen-hero__heading'
            key='editable'
            tagName='h2'
            placeholder='Hero Heading'
            value={heading}
            onChange={onChangeHeading}
            style={{ color: headingColor }}
          />
          <RichText
            className='full-screen-hero__text'
            key='editable'
            tagName='h3'
            placeholder='Hero Paragraph'
            value={text}
            onChange={onChangeText}
            style={{ color: textColor }}
          />
        </div>
      </div>,
    ];
  },
  save({ attributes }) {
    const {
      headerIcon,
      heading,
      headingColor,
      text,
      textColor,
      backgroundImage,
      overlayColor,
      overlayOpacity,
    } = attributes;

    return (
      <div
        className='full-screen-hero__container'
        style={{
          backgroundImage: `url(${backgroundImage})`,
        }}
      >
        <div
          className='full-screen-hero__overlay'
          style={{ background: overlayColor, opacity: overlayOpacity }}
        ></div>
        <div className='full-screen-hero__text-container'>
          <div className='full-screen-hero__icon-container'>
            <img src={headerIcon} />
          </div>
          <RichText.Content
            className='full-screen-hero__heading'
            tagName='h2'
            value={heading}
            style={{ color: headingColor }}
          />
          <RichText.Content
            className='full-screen-hero__text'
            tagName='h3'
            value={text}
            style={{ color: textColor }}
          />
        </div>
      </div>
    );
  },
});
