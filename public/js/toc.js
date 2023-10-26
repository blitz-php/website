function TOC(container, options) {
    this.container = container;
    this.uls = [document.createElement('ul')];
    this.buildStructure()
};

TOC.prototype.slugify = function(text) {
    return text.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
};

TOC.prototype.buildStructure = function() {
    const titles = this.container.querySelectorAll('h2, h3');

    let lastLvl = 0;

    for (let i = 0; i < titles.length; i++) {
        const title = titles[i]
        const lvl = parseInt(title.tagName.replace('H', '')) - 1
        const id = title.hasAttribute('id') ? title.getAttribute('id') : this.slugify(title.textContent)

        if (lvl - lastLvl > 1) {
            throw `Erreur dans la structure des titres, Saut d'un h${lastLvl + 1} vers un h${lvl + 1}`
        }
        lastLvl = lvl

        const li = document.createElement('li');

        const a = document.createElement('a');
        a.setAttribute('href', `#${id}`);

        const hashtag = document.createElement('a');
        hashtag.classList = 'anchor-link';
        hashtag.setAttribute('href', `#${id}`);

        title.setAttribute('id', id);
        // title.insertBefore(hashtag)

        a.textContent = title.textContent
        li.appendChild(a);
        if (! this.uls[lvl - 1]) {
            const ul = document.createElement('ul');
            this.uls[lvl - 1] = ul;  
            this.uls[lvl - 2].lastChild.appendChild(ul);
        }
        this.uls[lvl] = null;
        this.uls[lvl - 1].appendChild(li);
    }
};

TOC.prototype.appendTo = function(element) {
    element.appendChild(this.uls[0]);
};


