// menu burger

document.addEventListener("click", function (e) {
    let event = e.composedPath()
    let fog = document.querySelector('.fog')
    let burger = document.querySelector('.burger')
    let svg = document.getElementById('svg')
        if (event[0] === svg || event[1] === svg){
            menu(burger)
        }else if(event[0] === fog) {
            close(burger)
            closeModal()
        }
})

function closeModal(){
    let modal = document.querySelector('.modal')
    let shadow = document.querySelector('.fog')
    if (modal.classList.contains('modalShow')) {
        modal.classList.remove('modalShow')
        modal.style.display = 'none'
        shadow.classList.remove('zIndex-8')
        shadow.classList.add('zIndex-6')
        fog()
        clearModal(modal)
    }
}

function clearModal(modal){

    modal.querySelector('.title').innerHTML = ''
    modal.querySelector('.date').innerHTML = '<b><u>Date :</u></b>'
    modal.querySelector('.description').innerHTML = '<b><u>Description :</u></b>'
    modal.querySelector('.place').innerHTML = '<b><u>Lieux :</u></b>'

}

function fog() {
    let fog = document.querySelector('.fog')
    if (fog.style.display === 'block'){
        fog.style.display = 'none'
        fog.classList.remove('show')
    } else{
        fog.style.display = 'block'
        fog.classList.add('show')
    }
}

function menu(burger) {

    let svg = document.getElementById('svg')
    let menu = document.querySelector('.menu')


    if (burger.classList.contains('open')){
        close(burger)
    }else{
        burger.classList.remove('close')
        svg.classList.remove('unSkew')
        burger.classList.add('open')
        svg.classList.add('skew')
        menu.style.display = 'flex'
        menu.classList.add('M-show')
        fog()
    }
}

function close(burger) {
    let svg = document.getElementById('svg')
    let menu = document.querySelector('.menu')
    if (burger.classList.contains('open')){
        burger.classList.remove('open')
        svg.classList.remove('skew')
        menu.classList.remove('M-show')
        burger.classList.add('close')
        svg.classList.add('unSkew')
        menu.style.display = 'none'
        fog()
    }
}


//eventListener
function addEvent(array, fctn) {
    for (let i = 0; i < array.length; i++){
        array[i].addEventListener("click",fctn)
    }
}

//maps

function maps(){
    let name = this.dataset.name
    let gmaps = document.getElementById('gmap_canvas')
    let src = "https://maps.google.com/maps?q=saint-gratien%20" + name + "&t=&z=15&ie=UTF8&iwloc=&output=embed"
    let url = encodeURI(src)
    gmaps.setAttribute("src",url)
    let map = document.querySelector('.mapOuter')
    map.style.height = '55vh'
}

if (document.querySelector('.zIndex-4').dataset.name === 'accueil') {
    //slider
    let swiper = new Swiper('.swiper-container', {
        spaceBetween: 30,
        hashNavigation: {
            watchState: true,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    let Narrow = document.querySelector('.swiper-button-next')
    let Parrow = document.querySelector('.swiper-button-prev')
    Narrow.style.backgroundImage = "url('')"
    Parrow.style.backgroundImage = "url('')"

    //modal
    let elem = document.querySelectorAll('div.slider > a')
    addEvent(elem, modal)
    function modal() {
        let event = this.parentNode
        let title = event.childNodes['1'].innerText
        let date = event.dataset.date
        let place = event.dataset.place
        let content = event.dataset.content
        let modal = document.querySelector('.modal')

        modal.querySelector('.place').appendChild(document.createTextNode(place))
        modal.querySelector('.title').appendChild(document.createTextNode(title))
        modal.querySelector('.date').appendChild(document.createTextNode(date))
        modal.querySelector('.description').appendChild(document.createTextNode(content))

        modal.classList.add('modalShow')
        modal.style.display = 'block'
        let shadow = document.querySelector('.fog')
        shadow.classList.remove('zIndex-6')
        shadow.classList.add('zIndex-8')

        fog()
    }

}else if (document.querySelector('.zIndex-4').dataset.name === 'town') {
    //service google maps
    let elem = document.querySelectorAll('a[data-name]')
    addEvent(elem, maps)

}else if (document.querySelector('.zIndex-4').dataset.name === 'faq') {
    //faq
    let question = document.querySelectorAll('.question')
    addEvent(question,show)

    function show(){
        let answer = this.nextSibling.nextSibling
        if (answer.style.display === 'block'){
            answer.style.display = 'none'
        }else{
            answer.style.display = 'block'
        }
    }
}else if (document.querySelector('.zIndex-4').dataset.name === 'contact'){

    addEvent(document.querySelectorAll('.choice'), choice)

    function choice() {
        let choices = document.querySelector('.choices')

        if (this.dataset.icon === 'contact'){

            choices.style.display = 'none'
            document.querySelector('.contact').style.display = 'block'

            let registerForm = document.querySelector('#register')

            registerForm.addEventListener('submit', function (e) {
                e.preventDefault()
                Register()
            })

            let createObjectMsg = function (mail, subject, content) {
                let obj = {
                    mail: mail,
                    subject: subject,
                    content: content,
                }
                return obj
            }
            let Register = function () {
                let mail = document.querySelector('#email').value,
                    subject = document.querySelector('#sujet').value,
                    content = document.querySelector('#content').value
                let person = createObjectMsg(mail, subject, content)
                ajax(person, '#alert')
            }

        } else if (this.dataset.icon === 'exclamation'){
            choices.style.display = 'none'
            document.querySelector('.exclamation').style.display = 'block'
            document.querySelector('#cat').addEventListener('click', appearSelect)
        }
    }

}else if (document.querySelector('.zIndex-4').dataset.name === 'connexion') {
    let registerForm = document.querySelector('#register')
    registerForm.addEventListener('submit', function (e) {
        e.preventDefault()
        Register()
    })
    let confirm = document.querySelector('#confirm')
    confirm.addEventListener('submit', function (e) {
        e.preventDefault()
        let lastname = document.querySelector('#lastname').value,
            firstname = document.querySelector('#firstname').value,
            mail = document.querySelector('#email').value,
            mdp = document.querySelector('#mdp').value,
            confMdp = document.querySelector('#confMdp').value
            user = document.querySelector('#user').value
        if (mdp === confMdp){
            let person = createObjectConfirm(lastname, firstname, mail, mdp, user)
            ajax(person, '#issu')
        } else {
            document.getElementById('issu').innerText = 'Les mots de passe ne sont pas identiques'
        }

    })

    let createObjectConfirm = function (lastname, firstname, mail, mdp, user) {
        let obj = {
            lastname: lastname,
            firstname: firstname,
            mail: mail,
            mdp: mdp,
            user: user
        }
        return obj
    }

    let createObjectMsg = function (id, mdp) {
        let obj = {
            id: id,
            mdp: mdp
        }
        return obj
    }
    let Register = function () {
        let id = document.querySelector('#id').value,
            mdp = document.querySelector('#password').value
        let person = createObjectMsg(id, mdp)
        ajax(person, '#alert')
    }
}else if (document.querySelector('.zIndex-4').dataset.name === 'event'){
    let event = document.querySelectorAll('.event > .button')
    addEvent(event, showContent)
    document.querySelector('#datePick').addEventListener('input', search)

    function search() {
        let date = this.value
        let dates = document.querySelectorAll('#scroll')
        for (let i = 0 ; i < dates.length ; i++){
            if (dates[i].dataset.date === date){
                dates[i].scrollIntoView(false)
            }
        } 
    }

    function showContent() {
        console.log(this)
        let content = this.nextSibling.nextSibling
        if (this.classList.contains('rota')){
            content.style.display = 'none'
            this.classList.remove('rota')
            this.classList.add('unRota')
        }else{
            content.style.display = 'block'
            this.classList.remove('unRota')
            this.classList.add('rota')
        }

    }
}

function ajax(elem, msg) {

    fetch('http://localhost/Back/endyear-fixe/sendAjax.php', {
        method: 'POST',
        headers : new Headers(),
        body: JSON.stringify(elem)
    })
        .then((res) => res.json())
        .then((data) => {
            let alert = document.querySelector(msg)
            if (data.type === 0) {
                alert.innerText = data.msg
                alert.classList.remove('success')
                alert.classList.add('error')

            }else if (data.type === 2 ){

                document.location.href="http://localhost/Back/endyear-fixe/admin"

            }else if(data.type === 3){

                document.getElementById('register').style.display = 'none'
                conf(data.msg)

            }else if (data.type === 4){

                document.getElementById('confirm').style.display = 'none'
                account(data.msg)



            }else if (data.type === 5){

                document.getElementById('register').style.display = 'none'
                account(data.msg)

            }else {
                alert.innerText = data.msg
                alert.classList.remove('error')
                alert.classList.add('success')
            }
            alert.style.display = 'block'
        })
}

function appearSelect() {
    if (this.value.length !== 0) {
        let value = this.value
        let elem = document.querySelectorAll('#' + value)
        if (elem[0].classList.contains('appearSelect')){
            for (let i = 0; i<elem.length; i++) {
                elem[i].classList.add('displayNone')
                elem[i].classList.remove('appearSelect')
            }
        }else{
            for (let i = 0; i<elem.length; i++) {
                elem[i].classList.remove('displayNone')
                elem[i].classList.add('appearSelect')
                elem[i].addEventListener('click', appearButton)
            }
        }
    }
}

function appearButton() {
    if (this.value.length !== 0) {
        let value = this.value
        let elem = document.querySelectorAll('#msg, #button, #labMsg')
        for (let i = 0; i<elem.length; i++) {
            elem[i].classList.remove('displayNone')
        }

        let registerForm = document.querySelector('#report')
        registerForm.addEventListener('submit', function (e) {
            e.preventDefault()
            Register(value)
        })

        let createObjectMsg = function (sCat, cat, content) {
            let obj = {
                sCat: sCat,
                cat: cat,
                content: content,
            }
            return obj
        }
        let Register = function (value) {
             let cat = document.querySelector('#cat').value,
                content = document.querySelector('#msg').value
            console.log(content)
            let person = createObjectMsg(value, cat, content)
            ajax(person, '#info')
        }
    }
}
function conf(info) {
    document.getElementById('confirm').style.display = 'flex'
    document.getElementById('lastname').value = info['lastname']
    document.getElementById('firstname').value = info['firstname']
    document.getElementById('email').value = info['email']
    document.getElementById('user').value = info['id']

}
function account(user) {
    document.querySelector('.bills').style.display = 'flex'

    let tbody = document.getElementsByTagName('tbody'),
        td = tbody[0].getElementsByTagName('td'),
        tr = tbody[0].getElementsByTagName('tr')

    td[0].appendChild(document.createTextNode(user[0]['title']))
    td[1].appendChild(document.createTextNode(user[0]['amount']))
    td[2].appendChild(document.createTextNode(user[0]['date']))
    let a = td[3].appendChild(document.createElement('a'))
    a.setAttribute('href','admin/' + user[0]['files'])
    a.setAttribute("download", 'facture')
    a.innerText = 'Télécharger'


    for (let i = 1 ; i < user.length ; i++){
        tbody[0].appendChild(document.createElement('tr'))
        tr = tbody[0].getElementsByTagName('tr')
        tr[i].appendChild(document.createElement('td'))
        tr[i].appendChild(document.createElement('td'))
        tr[i].appendChild(document.createElement('td'))
        tr[i].appendChild(document.createElement('td'))
        let td = tr[i].getElementsByTagName('td')
        console.log(td)



        td[0].appendChild(document.createTextNode(user[i]['title']))
        td[1].appendChild(document.createTextNode(user[i]['amount']))
        td[2].appendChild(document.createTextNode(user[i]['date']))
        let a = td[3].appendChild(document.createElement('a'))
        a.setAttribute('href','admin/' + user[i]['files'])
        a.setAttribute("download", 'facture')
        a.innerText = 'Télécharger'
    }


}