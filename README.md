# DesignPickle WP theme

This is the WP theme for the Design Pickle website. There are some nuances with it, and specific ways to do certain things. I’ll outline them here.

## Required plugins:
- Contact Form 7 https://wordpress.org/plugins/contact-form-7/
- Contact Form 7 Infusionsoft add on  https://wordpress.org/plugins/contact-form-7-infusionsoft-add-on/
- Basic Pricing Tables https://github.com/carlfairclough/basic-wp-pricing-tables
- Basic FAQs https://github.com/carlfairclough/wp-basic-faqs

## Basic setup
- Please ensure the theme is installed in `/wp-content/themes/designpickle

### Modifying CSS
CSS was compiled using Codekit. I wrote SCSS in the `library/scss/` folder, if you make alterations I'd suggest starting from there.

---
## Global Custom fields
The names for the custom fields that are used throughout the page templates, APART FROM the blog are very semantic and clear, here are the key ones.

#### Headers
Headers all share the same custom fields. They are as follows:
- `header_h1` - The page title *optional: this will fallback to the page title if left blank*
- `header_subhead` - The text underneath the title
- `header_subhead_extra` - Extra text area
- `header_primary_button_text` *optional*
- `header_primary_button_url` *optional*
- `header_secondary_button_text` *optional*
- `header_secondary_button_url` *optional*
- `header_color` - This accepts values of `green`, `white` or `gray`

### Footers
These don't apply to the `Free Request` template or the `Squeeze Page` template.
- `footer_h2` - The title in the footer. If this is not set, the CTA section will not display.
- `footer_subhead` *optional*
- `footer_subhead_extra` *optional*
- `footer_primary_button_text` *optional*
- `footer_primary_button_url` *optional*
- `footer_secondary_button_text` *optional*
- `footer_secondary_button_url` *optional*
- `footer_color` - This accepts values of `green`, `white` or `gray`
*Note: if you want to display an inpage contact form after clicking a button, please set the URL to be the [Contact Form 7 shortcode].

### Testimonials
Global testimonials can be set in Apearrance > Design Pickle Theme Settings > Testimonials.
If custom fields are not set for the individual pages, then they will fall back to those.
- `testimonials_title` - MUST BE SET ON EACH PAGE WHERE THEY APPEAR
- `testimonials_subhead` - MUST BE SET ON EACH PAGE WHERE THEY APPEAR
- `testimonial_1_name` - Name of the first testimonial
- `testimonial_1_img` - A URL to their image
- `testimonial_1_position` - Their job title
- `testimonial_1_testimonial` - The content of the testimonial
- `testimonial_2_name` - Name of the first testimonial
- `testimonial_2_img` - A URL to their image
- `testimonial_2_position` - Their job title
- `testimonial_2_testimonial` - The content of the testimonial
## Page Templates
### Homepage
The Homepage template should be the default homepage template, it contains the following custom fields:
- All header fields
- `core_point_1_img` - The image URL for the first image
- `core_point_1_subhead` - The subhead for the block
- `core_point_1_paras` - The accompanying text. Please wrap this in <p> </p> tags.
- `core_point_2_img`
- `core_point_2_subhead`
- `core_point_2_paras`
- `core_point_3_img`
- `core_point_3_subhead`
- `core_point_3_paras`
- All testimonial fields
- All footer fields

### How It Works Page
- All header fields
- `howitworks_1_title`
- `howitworks_1_para` - Do not wrap this in <p> </p> tags
- `howitworks_2_title`
- `howitworks_2_para`
- `howitworks_3_title`
- `howitworks_3_para`
- All testimonial fields
- All footer fields

### Pricing Page
Please place the pricing table content in the main content area of the page.
- All header fields
- All testimonial fields
- All footer fields

### Work Samples
Use wordpress' built-in gallery creator to generate the content for this page. Ensure that the shortcode is placed in the main content area of the page.
- All header fields
- `pastwork_title`
- `pastwork_subhead`
- All footer fields

### FAQs
Ensure that the FAQs shortcode is in the main content area of the page
- All header fields
- All footer fields
 
### Contact page
- All header fields
- `contact_form_shortcode` - Enter the shortcode for the form here.
- All footer fields

### Squeeze Page
Insert the form shortcode into the main content area of this page.
- All header fields.

### Free Request Page
Insert the form shortcode into the main content area of this page.
- Only `header_h1`

---
## Using Contact Form 7
For forms to display properly, you should use the following HTML.
Wrap the form with:
```
<h2>Send Us A Message</h2>
<div class="inner-contact-form">
... form fields here ...
[submit class:button-green-fill "Button Text Here"]
</div>
```

Text/email/number/URL/textarea/select fields:
```
<p class="inputwrap">
    <span class="fakelabel">YOUR LABEL HERE</span>
    ...your field here...
</p>
```

Checkboxes:
```
<div class="newsletter-area">
    <h3>YOUR LABEL HERE</h3>
    ...checkboxes go here...
</div>
```

Files:
This one is more complex. Please change the labels accordingly.
```
<div class="file-upload-wrap">
    <span class="fakelabel">Inspiration:</span>
    <div class="extrainputwrap extraurlwrap hidden" field="inspiration-url-1">
        [url inspiration-url-1]
	<div class="delete-field" field="inspiration-url-1">x</div>
    </div>
    <div class="extrainputwrap extraurlwrap hidden" field="inspiration-url-2">
        [url inspiration-url-2]
	<div class="delete-field" field="inspiration-url-2">x</div>
    </div>
    <div class="extrainputwrap extraurlwrap hidden" field="inspiration-url-3">
        [url inspiration-url-3]
	<div class="delete-field" field="inspiration-url-3">x</div>
    </div>
    <div class="extrainputwrap extrafilewrap hidden" field="inspiration-file-1">
        <div class="inputfilewrap">
	    <div class="filesrc" field="inspiration-file-1">No File Chosen</div>
            <div class="choose-file">Choose File</div>
            [file inspiration-file-1]
        </div>
	<div class="delete-field" field="inspiration-file-1">x</div>
    </div>
    <div class="extrainputwrap extrafilewrap hidden" field="inspiration-file-2">
        <div class="inputfilewrap">
	    <div class="filesrc" field="inspiration-file-2">No File Chosen</div>
            <div class="choose-file">Choose File</div>
            [file inspiration-file-2]
        </div>
	<div class="delete-field" field="inspiration-file-2">x</div>
    </div>
    <div class="extrainputwrap extrafilewrap hidden" field="inspiration-file-3">
        <div class="inputfilewrap">
	    <div class="filesrc" field="inspiration-file-1">No File Chosen</div>
            <div class="choose-file">Choose File</div>
            [file inspiration-file-3]
        </div>
	<div class="delete-field" field="inspiration-file-3">x</div>
    </div>
    <div class="request-button-wrap">
        <a class="add-url button-black-outline" isfor="inspiration" href="#">Add Url</a>
        <a class="add-file button-black-outline" isfor="inspiration" href="#">Add File</a>
    </div>
</div>
```
