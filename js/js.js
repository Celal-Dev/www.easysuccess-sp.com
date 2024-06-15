// Menu responsive
// By NguyenLong
class wilMenu {
    constructor(el, opt) {
        const optDefault = {
            moreButton: '<a href="#">MENU</a>',
            classMore: 'item-menu-more',
            classMoreChild: 'sub-menu-more sub-menu'
        }
        this.opts = wilExtend(optDefault, opt);
        this.els = document.querySelectorAll(el);
        this.create(this.els);
    }
    
    create(els) {
        wilEach(els, (el) => {
            el.style.display = 'inline-block';
            this.addMore(el);
            this.responsive(el);
        });
    }
    
    addMore(el) {
        const {opts} = this;
        let moreHTML = `
            <li class="${opts.classMore}">
                ${opts.moreButton}
                <ul class="${opts.classMoreChild}"></ul>
            </li>
        `;
        if (el.innerHTML.indexOf(opts.moreButton) === -1) {
            el.insertAdjacentHTML('beforeend', moreHTML);
        }
    }
   
    
    responsive(el) {
        const itemMore = el.children[el.children.length-1];
        const subMore = itemMore.lastElementChild;
        let elWidthBegin = el.offsetWidth;
        let itemMoreWidth = itemMore.offsetWidth;
        let lastResize = 0;
        const cst = 100;
        
        itemMore.style.display = 'none';
        itemMore.firstElementChild.addEventListener('click', event => {
            event.stopPropagation();
            event.preventDefault();
        })
        
        const eventResize = document.createEvent('Event');
        eventResize.initEvent('eventResize', true, true);
        el.addEventListener('eventResize', () => {
            let ww = window.innerWidth;
            let elWidth = el.offsetWidth;
            let parentWidth = el.parentNode.offsetWidth;
            if (ww > lastResize) {
                if (elWidth + cst <= parentWidth) {
                    if (subMore.innerHTML !== '') {
                        el.insertBefore(
                            subMore.firstChild,
                            el.childNodes[el.childNodes.length-2]
                        );
                    }
                }
                if (elWidthBegin + cst + 10 <= parentWidth + itemMoreWidth) {
                    itemMore.style.display = 'none';
                }
            } else {
                let listItemLast = el.children[el.children.length-2];
                if (elWidth + cst > parentWidth) {
                    if (listItemLast !== undefined) {
                        subMore.insertBefore(
                            listItemLast,
                            subMore.firstChild
                        );
                    }
                }
                if (elWidthBegin + cst + 10 > parentWidth + itemMoreWidth) {
                    itemMore.style.display = 'inline-block';
                }
            }
            lastResize = ww;
        });
        const update = setInterval(() => {
            let elWidth = el.offsetWidth;
            let parentWidth = el.parentNode.offsetWidth;
            if (elWidth + cst > parentWidth) {
                el.dispatchEvent(eventResize);
            } else {
                clearTimeout(update);
            }
        }, 5);
        window.addEventListener('resize', () => {
            el.dispatchEvent(eventResize);
        });
    }
}
function wilEach(els, cb) {
	for(var i = 0, len = els.length; i < len; i++) {
		if (i === len) break;
		cb(els[i], i);
	}
}
function wilExtend(obj, src) {
    if (typeof src === 'object') {
        wilEach(Object.keys(src), (key) => {
            obj[key] = src[key];
        });
    }
    return obj;
}

// changement image logo navbar

document.addEventListener('scroll', () => {
  const header = document.querySelector('.demo-header');
  const logoImg = document.getElementById('logoImg');

  if (window.scrollY > 50) { // Ajustez la valeur selon vos besoins
      header.classList.add('scrolled');
      logoImg.src = 'images/logoNavBarOpaque.jpg'; // Chemin de l'image non transparente
  } else {
      header.classList.remove('scrolled');
      logoImg.src = 'images/logoNavBar.jpg'; // Chemin de l'image transparente
  }
});

// Menu responsive
// By NguyenLong
// moreButton: string ( tag html )
// classMore: string
// classMoreChild: string
const menu = new wilMenu('.nav-list', {
    moreButton: '<a class="a5" href="#">MENU</a>',
    classMore: 'item-menu-more',
    classMoreChild: 'sub-menu-more sub-menu'
});

document.addEventListener('scroll', () => {
    const header = document.querySelector('header');

    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    }else{
        header.classList.remove('scrolled')
    }
})



document.addEventListener('scroll', () => {
    const a = document.querySelector('.a1');

    if (window.scrollY > 50) {
        a.classList.add('colorA');
    }else{
        a.classList.remove('colorA')
    }
})
document.addEventListener('scroll', () => {
    const a = document.querySelector('.a2');

    if (window.scrollY > 50) {
        a.classList.add('colorA');
    }else{
        a.classList.remove('colorA')
    }
})
document.addEventListener('scroll', () => {
    const a = document.querySelector('.a3');

    if (window.scrollY > 50) {
        a.classList.add('colorA');
    }else{
        a.classList.remove('colorA')
    }
})
document.addEventListener('scroll', () => {
    const a = document.querySelector('.a4');

    if (window.scrollY > 50) {
        a.classList.add('colorA');
    }else{
        a.classList.remove('colorA')
    }
})
document.addEventListener('scroll', () => {
    const a = document.querySelector('.a5');

    if (window.scrollY > 50) {
        a.classList.add('colorA');
    }else{
        a.classList.remove('colorA')
    }
})
document.addEventListener('scroll', () => {
    const a = document.querySelector('.a6');

    if (window.scrollY > 50) {
        a.classList.add('colorA');
    }else{
        a.classList.remove('colorA')
    }
})
document.addEventListener('scroll', () => {
    const a = document.querySelector('.a7');

    if (window.scrollY > 50) {
        a.classList.add('colorA');
    }else{
        a.classList.remove('colorA')
    }
})

// apparition h1 p progressive header




let slide = document.querySelectorAll('.slide');
        var current = 0;

        function cls(){
            for(let i = 0; i < slide.length; i++){
                  slide[i].style.display = 'none';
            }
        }

        function next(){
            cls();
            if(current === slide.length-1) current = -1;
            current++;

            slide[current].style.display = 'block';
            slide[current].style.opacity = 0.4;

            var x = 0.4;
            var intX = setInterval(function(){
                x+=0.1;
                slide[current].style.opacity = x;
                if(x >= 1) {
                    clearInterval(intX);
                    x = 0.4;
                }
            }, 100);

        }

        function prev(){
            cls();
            if(current === 0) current = slide.length;
            current--;

            slide[current].style.display = 'block';
            slide[current].style.opacity = 0.4;

            var x = 0.4;
            var intX = setInterval(function(){
                x+=0.1;
                slide[current].style.opacity = x;
                if(x >= 1) {
                    clearInterval(intX);
                    x = 0.4;
                }
            }, 100);

        }

        function start(){
            cls();
            slide[current].style.display = 'block';
        }
        start();



const btn = document.querySelector('.hautDePage');

btn.addEventListener('click', () => {
window.scrollTo({
top: 0,
left: 0,
behavior: "smooth"
})
})


// fleche haut :

document.addEventListener('scroll', () => {
    const hdp = document.querySelector('.hautDePage');
    if (window.scrollY > 50) {
        hdp.classList.remove('display');
    }else {
        hdp.classList.add('display');
    }
})



// footer apparition

const footer = document.querySelectorAll(".footerIndex")

let options = {
  // root: null,
  rootMargin: "-10% 0px",
  threshold: 0
}

function handleIntersect(entries){
  console.log(entries);

  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.style.opacity = 1;
    }
  })
}

const observer = new IntersectionObserver(handleIntersect, options)

footer.forEach(image => {
  observer.observe(image)
})

// apparition aPropos entete

const aPropos = document.querySelectorAll(".presentation")

let optionsApropos = {
  // root: null,
  rootMargin: "-20% 0px",
  threshold: 0
}

function handleIntersect(entries){
  console.log(entries);

  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.style.opacity = 1;
    }
  })
}

const aPropos1 = new IntersectionObserver(handleIntersect, optionsApropos)

aPropos.forEach(image => {
    aPropos1.observe(image)
})

// apparition aPropos image

const aProposimage = document.querySelectorAll(".imgaPropos")

let optionsAproposImage = {
  // root: null,
  rootMargin: "-10% 0px",
  threshold: 0
}

function handleIntersect(entries){
  console.log(entries);

  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.style.opacity = 1;
    }
  })
}

const aProposImage1 = new IntersectionObserver(handleIntersect, optionsAproposImage)

aProposimage.forEach(image => {
    aProposImage1.observe(image)
})

// apparition texte a propos

const aProposText = document.querySelectorAll(".texteApropos")

let optionsAproposTexte = {
  // root: null,
  rootMargin: "-10% 0px",
  threshold: 0
}

function handleIntersect(entries){
  console.log(entries);

  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.style.opacity = 1;
    }
  })
}

const aProposTexte1 = new IntersectionObserver(handleIntersect, optionsAproposTexte)

aProposText.forEach(image => {
    aProposTexte1.observe(image)
})

// apparition nos prestation

const metierPresentation = document.querySelectorAll(".metierPresentation")

let optionsmetierPresentation = {
  // root: null,
  rootMargin: "-18% 0px",
  threshold: 0
}

function handleIntersect(entries){
  console.log(entries);

  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.style.opacity = 1;
    }
  })
}

const metierPresentation1 = new IntersectionObserver(handleIntersect, optionsmetierPresentation)

metierPresentation.forEach(image => {
    metierPresentation1.observe(image)
})

// apparition nos prestation 2

const containerMetier = document.querySelectorAll(".ficheMetier")

let optionscontainerMetier = {
  // root: null,
  rootMargin: "-10% 0px",
  threshold: 0
}

function handleIntersect(entries){
  console.log(entries);

  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.style.opacity = 1;
    }
  })
}

const containerMetier1 = new IntersectionObserver(handleIntersect, optionscontainerMetier)

containerMetier.forEach(image => {
    containerMetier1.observe(image)
})

// apparition devis

const devis = document.querySelectorAll(".metierPresentation")

let optionsDevis = {
  // root: null,
  rootMargin: "-9% 0px",
  threshold: 0
}

function handleIntersect(entries){
  console.log(entries);

  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.style.opacity = 1;
    }
  })
}

const devis1 = new IntersectionObserver(handleIntersect, optionsDevis)

devis.forEach(image => {
    devis1.observe(image)
})

// apparition image Pub

const pub = document.querySelectorAll(".imgPub")

let optionsPub = {
  // root: null,
  rootMargin: "-18% 0px",
  threshold: 0
}

function handleIntersect(entries){
  console.log(entries);

  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.style.opacity = 1;
    }
  })
}

const pub1 = new IntersectionObserver(handleIntersect, optionsPub)

pub.forEach(image => {
    pub1.observe(image)
})

// apparition texte pub

const pubTexte = document.querySelectorAll(".pubTexte")

let optionsPubTexte = {
  // root: null,
  rootMargin: "-18% 0px",
  threshold: 0
}

function handleIntersect(entries){
  console.log(entries);

  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.style.opacity = 1;
    }
  })
}

const pubTexte1 = new IntersectionObserver(handleIntersect, optionsPubTexte)

pubTexte.forEach(image => {
    pubTexte1.observe(image)
})

// apparition contact

const contact = document.querySelectorAll(".contact")

let optionsContact = {
  // root: null,
  rootMargin: "-10% 0px",
  threshold: 0
}

function handleIntersect(entries){

  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.style.opacity = 1;
    }
  })
}

const contact1 = new IntersectionObserver(handleIntersect, optionsContact)

contact.forEach(image => {
    contact1.observe(image)
})

// cookie

const cookieContainer = document.querySelector(".cookie-container");
const cookieButton = document.querySelector(".cookie-btn");

cookieButton.addEventListener("click", () => {
  cookieContainer.classList.remove("active");
  localStorage.setItem("cookieBannerDisplayed", "true");
});

setTimeout(() => {
  if (!localStorage.getItem("cookieBannerDisplayed")) {
    cookieContainer.classList.add("active");
  }
}, 2000);









