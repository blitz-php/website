wrapHeadingsInAnchors();
replaceBlockquotesWithCalloutsInDocs();
enableGitDiffOnSampleCode();

function wrapHeadingsInAnchors() {
    [...document.querySelector('#guide-content').querySelectorAll('a[name]')].forEach(anchor => {
        const heading = anchor.parentNode.nextElementSibling;
        heading.id = anchor.name;
        // heading.className = 'mt-4'
        anchor.href = `#${anchor.name}`;
        anchor.removeAttribute('name');
        anchor.setAttribute('style', 'color: inherit');
        [...heading.childNodes].forEach(node => anchor.appendChild(node));
        heading.appendChild(anchor);
    });
}

function replaceBlockquotesWithCalloutsInDocs() {
    [...document.querySelectorAll('#guide-content blockquote p')].forEach(el => {
        // Legacy Laravel styled notes...
        replaceBlockquote(el, /\{(.*?)\}/, (type) => {
            switch (type) {
                case "note":
                    return ['exclamation', 'danger'];
                case "tip":
                    return ['lightbulb', 'info'];
                case "laracasts":
                case "video":
                    return ['laracast', 'blue'];
                default:
                    return [null, null];
            }
        });

        // GitHub styled notes...
        replaceBlockquote(el, /^<strong>(.*?)<\/strong>(?:<br>\n?)?/, (type) => {
            switch (type) {
                case "Warning":
                case "Attention":
                    return ['exclamation', 'warning'];
                case "Note":
                case "Info":
                    return ['lightbulb', 'info'];
                default:
                    return [null, null];
            }
        });
    });
}

function replaceBlockquote(el, regex, getImageAndColorByType) {
    var str = el.innerHTML;
    var match = str.match(regex);
    var img, color;

    if (match) {
        var type = match[1] || false;
    }

    if (type) {
        [img, color] = getImageAndColorByType(type);

        if (img === null && color === null) {
            return;
        }

        const wrapper = document.createElement('div');
        wrapper.classList = 'bd-callout my-3 mx-auto px-4 py-4 shadow d-lg-flex align-items-center';

        /*
        const imageWrapper = document.createElement('div');
        imageWrapper.classList = `d-flex align-items-center justify-content-center`;
        const image = document.createElement('svg');
        image.classList = `bi h1`;
        const use = document.createElement('use');
        use.setAttribute('href', `/lib/bootstrap/bootstrap-icons.svg#${img}`)
        image.appendChild(use);
        imageWrapper.appendChild(image);
        wrapper.appendChild(imageWrapper);
        */

        // el.parentNode.insertBefore(wrapper, el);
        el.parentNode.classList = 'bd-callout my-3 mx-auto px-4 py-4 shadow'

        // el.innerHTML = str.replace(regex, '');

        // el.classList = 'mb-0 ms-lg-4';
        el.classList = 'mb-0';
        wrapper.classList.add(`bd-callout-${color}`);
        el.parentNode.classList.add(`bd-callout-${color}`);
        // wrapper.appendChild(el);
    }
}

function enableGitDiffOnSampleCode() {
    const elements = document.querySelectorAll('code');
    elements.forEach(element => {
        const className = element.classList.value
        const matches = (new RegExp('language\-diff\-([a-z]+)')).exec(className)
        if (matches) {
            element.classList.add('diff-highlight')
        }
    });

}