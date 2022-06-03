'use strict'

/*
*------------------------Global variables-----------------------------
*/

const HOVERTIME = 300
const ANIMTIME = 800
const ROOTS = getComputedStyle(document.documentElement)

/*
*------------------------Pages-----------------------------
*/

let isAnimating = false

const header = document.querySelector('.header')

if (header) {
	headerInit()
	headerBackgroundColor()
	clearBtnInit()

	document.addEventListener(
		'scroll', () => requestAnimationFrame(() => headerBackgroundColor())
	)

	if (document.querySelector('.header__cat-button-block')) {
		desktopCategoryPopupInit()
	}
	else {
		modileCategoryPopupInit()
	}
}


let sliderArr = []
let sliderItemsInView = 0

if (document.querySelector('.slider')) {
	sliderInit()

	window.addEventListener('resize', () => {
		if (sliderItemsInView === ROOTS.getPropertyValue('--slide-count')) return

		sliderItemsInView = ROOTS.getPropertyValue('--slide-count')

		for (let slider of sliderArr) {
			updateSliderStep(slider)
			sliderPointsInit(slider)
		}
	})
}

if (document.querySelector('.form')) {
	formInit()
}

/*
*------------------------Header scroll animation-----------------------------
*/

function headerBackgroundColor() {
	if (pageYOffset > 0) {
		header.classList.add('fill')
	}
	else {
		header.classList.remove('fill')
	}
}

/*
*------------------------Popups-----------------------------
*/

function headerInit() {
	const menuBtn = header.querySelector('.burger-button')
	const menuPopup = document.querySelector('.menu__popup')

	const toSearchBtn = header.querySelector('.to-search__button')
	const searchPopup = document.querySelector('.search__popup')

	menuBtn.addEventListener('click', () => {
		if (isAnimating) return
		isAnimating = true
		setTimeout(() => isAnimating = false, HOVERTIME)

		showPopup('.menu__popup')
		hideHeader()
	})
	menuPopup.addEventListener('click', (e) => {
		if (isAnimating) return
		isAnimating = true
		setTimeout(() => isAnimating = false, HOVERTIME)

		if (!e.target.closest('.popup__body')) {
			hidePopup('.menu__popup')
			showHeader()
		}
	})
	toSearchBtn.addEventListener('click', () => {
		if (isAnimating) return
		isAnimating = true
		setTimeout(() => isAnimating = false, HOVERTIME)

		const input = searchPopup.querySelector('.input-text')

		showPopup('.search__popup')
		hideHeader()
		setTimeout(() => input.focus(), HOVERTIME)
	})
	searchPopup.addEventListener('click', (e) => {
		if (isAnimating) return
		isAnimating = true
		setTimeout(() => isAnimating = false, HOVERTIME)
		
		if (!e.target.closest('.popup__body')) {
			hidePopup('.search__popup')
			showHeader()
		}
	})
}

function hideHeader() {
	header.classList.add('animating')
	header.style.transform = 'translateY(-100%)'
	setTimeout(() => {
		header.classList.remove('animating')
	}, HOVERTIME)
}
function showHeader() {
	header.classList.add('animating')
	header.style.transform = ''
	setTimeout(() => {
		header.classList.remove('animating')
	}, HOVERTIME)
}

//---------------------categories__popup------------------------------

function desktopCategoryPopupInit() {
	const catBtn = document.querySelector('.header__cat-button-block')
	const catPopupBlock = document.querySelector('.cat-popup__block')

	catBtn.addEventListener('mouseenter', () => {
		if (isMobile()) return
		showPopup('.categories__popup')
	})
	catBtn.addEventListener('mouseleave', () => {
		if (isMobile()) return
		hidePopup('.categories__popup')
	})
	catPopupBlock.addEventListener('mouseenter', () => {
		if (isMobile()) return
		showPopup('.categories__popup')
	})
	catPopupBlock.addEventListener('mouseleave', () => {
		if (isMobile()) return
		hidePopup('.categories__popup')
	})
}

function modileCategoryPopupInit() {
	const catBtn = document.querySelector('.activity__filter-button')
	const catPopup = document.querySelector('.filter-popup')

	catBtn.addEventListener('click', () => {
		if (isAnimating) return
		isAnimating = true
		setTimeout(() => isAnimating = false, HOVERTIME)

		showPopup('.filter-popup')
		hideHeader()
	})
	catPopup.addEventListener('click', (e) => {
		if (isAnimating) return
		isAnimating = true
		setTimeout(() => isAnimating = false, HOVERTIME)
		
		if (!e.target.closest('.popup__body')) {
			hidePopup('.filter-popup')
			showHeader()
		}
	})
}

/*
*----------------------------Popups logic-------------------------
*/

function showPopup(elemClass) {
	const popup = document.querySelector(elemClass)

	lockScroll()
	popup.classList.add('show')
}
function hidePopup(elemClass) {
	const popup = document.querySelector(elemClass)

	unlockScroll()
	popup.classList.remove('show')
}
function isClosePopup(elemClass, e) {
	if (!e.target.closest('.popup__body')) hidePopup(elemClass)
}

function lockScroll() {
	const page = document.documentElement
	const header = document.querySelector('.header')

	let scollWidth = getScrollWidth()

	page.style.overflow = 'hidden'

	page.style.paddingRight = `${scollWidth}px`
	header.style.paddingRight = `${scollWidth}px`
}
function unlockScroll() {
	const page = document.documentElement
	const header = document.querySelector('.header')

	page.style.overflow = ''

	page.style.paddingRight = ''
	header.style.paddingRight = ''
}

/*
*------------------------Sliders-----------------------------
*/

function sliderInit() {
	const sliders = document.querySelectorAll('.slider')

	sliderItemsInView = ROOTS.getPropertyValue('--slide-count')

	sliders.forEach((slider) => {
		const leftBtn = slider.querySelector('.slider__left-button')
		const rightBtn = slider.querySelector('.slider__right-button')
		slider.step = 0

		sliderArr.push(slider)

		leftBtn.addEventListener('click', () => {
			if (isAnimating) return
			isAnimating = true
			setTimeout(() => isAnimating = false, ANIMTIME)
			
			slideLeft(leftBtn)
		})
		rightBtn.addEventListener('click', () => {
			if (isAnimating) return
			isAnimating = true
			setTimeout(() => isAnimating = false, ANIMTIME)
			
			slideRight(rightBtn)
		})
		
		sliderPointsInit(slider)
	})
}
function sliderPointsInit(slider) {
	const items = slider.querySelectorAll('.slider__item')
	const pointBlock = slider.querySelector('.slider__points-block')

	pointBlock.innerHTML = ''

	const pointsCount = Math.ceil(items.length / ROOTS.getPropertyValue('--slide-count'))
	slider.allStep = pointsCount - 1

	for (let i = 0; i < pointsCount; i++) {
		const node = document.createElement('span')
		node.className = 'slider-point'

		pointBlock.append(node)
	}

	updateSliderPoints(slider)
}

function slideLeft(button) {
	const slider = button.closest('.slider')
	const tape = slider.querySelector('.slider-tape')
	let tapePos = getTranslateX(tape)
	const itemsAtStep = ROOTS.getPropertyValue('--slide-count')

	slider.step--

	if (slider.step + 1 === 0) {
		slider.step = slider.allStep
		tapePos += offsetSlide(slider, 'last')
	}
	else if (slider.step + 1 === 1) {
		tapePos = 0
	}
	else {
		tapePos += offsetSlide(slider, slider.step * itemsAtStep + (itemsAtStep - 1))
	}
	
	updateSliderPoints(slider)
	tape.style.transform = `translateX(${tapePos}px)`
}
function slideRight(button) {
	const slider = button.closest('.slider')
	const tape = slider.querySelector('.slider-tape')
	let tapePos = getTranslateX(tape)
	const itemsAtStep = ROOTS.getPropertyValue('--slide-count')

	slider.step++

	if (slider.step - 1 === slider.allStep) {
		slider.step = 0
		tapePos = 0
	}
	else if (slider.step === slider.allStep) {
		tapePos += offsetSlide(slider, 'last')
	}
	else {
		tapePos += offsetSlide(slider, slider.step * itemsAtStep + (itemsAtStep - 1))
	}

	updateSliderPoints(slider)
	tape.style.transform = `translateX(${tapePos}px)`
}

function updateSliderPoints(slider) {
	const points = slider.querySelectorAll('.slider-point')
	let i = 0

	for (let point of points) {
		if (point.classList.contains('focus')) point.classList.remove('focus')
		if (i === slider.step) point.classList.add('focus')

		i++
	}
}
function updateSliderStep(slider) {
	slider.step = Math.floor(slider.step / sliderItemsInView)
}

/*
*------------------------Clear button-----------------------------
*/

function clearBtnInit() {
	const clearBtn = document.querySelectorAll('.clear-button')

	clearBtn.forEach((button) => button.addEventListener('click', (e) => {
		e.preventDefault()
		
		const parentBlock = button.parentElement
		const input = parentBlock.querySelector('.input')

		input.value = ''
	}))
}

/*
*------------------------Form send-----------------------------
*/

function formInit() {
	const form = document.querySelector('.form')
	const popup = document.querySelector('.success__popup')

	form.addEventListener('submit', (e) => formSend(e, form))

	popup.addEventListener('click', (e) => {
		if (isAnimating) return
		isAnimating = true
		setTimeout(() => isAnimating = false, HOVERTIME)
		
		if (!e.target.closest('.popup__body')) {
			hidePopup('.success__popup')
			showHeader()
		}
	})

	if (form.querySelector('.input-file')) {
		inputFileInit(form)
	}
}
function inputFileInit(form) {
	const inputFile = form.querySelector('.input-file')

	inputFile.addEventListener( 'change', () => fileInputStatus(form) )
}
function fileInputStatus(form) {
	const inputFile = form.querySelector('.input-file')
	const labelFile = form.querySelector('.label-file')
	const iconFile = labelFile.querySelector('.icon')

	if (inputFile.files.length != 0) {
		labelFile.classList.add('fill')
		iconFile.className = 'joint-upload-fill icon'
	}
	else {
		labelFile.classList.remove('fill')
		iconFile.className = 'joint-upload icon'
	}
}
function formSend(e, form) {
	e.preventDefault()

	if (formValidate(form)) return

	let backFile = jointAjax.ajaxurl
	let curPage = ''

	let formData = new FormData(form)

	if (form.classList.contains('form-contacts')) {
		curPage = 'contacts'
	}
	else if (form.classList.contains('form-send')){
		formData.append('file', form.file.files)
		curPage = 'send'
	}
	else {
		return
	}

	formData.append('action', curPage)
	
	fetch(backFile, {
		method: 'POST',
		body: formData,
	})
		.then(form.reset())
		.then(isFileForm(form))
		.then(showPopup('.success__popup'))
		.then(hideHeader())
		.catch(error => {
			error.json().then(response => {
				alert(response.message)
			})
		})
}
function formValidate(form) {
	const reqFields = form.querySelectorAll('.require')
	let errors = false

	reqFields.forEach((reqItem) => {
		if (reqItem.value === '') {
			reqItem.classList.add('void')
			setTimeout(() => reqItem.classList.remove('void'), 2000)
			errors = true
		}
	})

	return errors
}
function isFileForm(form) {
	if (form.file) fileInputStatus(form)
}

/*
*------------------------Common functions-----------------------------
*/
function getScrollWidth() {
	return innerWidth - document.documentElement.clientWidth
}
function isMobile() {
	return document.documentElement.clientWidth > 1000 ? false : true
}
function getTranslateX(item) {
	let style = window.getComputedStyle(item)
	let matrix = new WebKitCSSMatrix(style.transform)
	return matrix.e
}
function offsetSlide(slider, idx) {
	const body = slider.querySelector('.slider-body')
	const tape = slider.querySelector('.slider-tape')
	const child = idx ==='last' ?
		tape.lastElementChild : tape.querySelectorAll('.slider__item')[idx]

	return body.getBoundingClientRect().right - child.getBoundingClientRect().right
}
function removeLetters(value) {
	return +value.replace(/\D/g,'');
}