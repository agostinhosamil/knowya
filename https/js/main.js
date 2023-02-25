(function () {
  const keyCodes = {
    RIGHT: 39,
    LEFT: 37,
    ESC: 27
  }

  function __d() {
    const args = arguments

    window.document.addEventListener('readystatechange', function () {
      if (window.document.readyState === 'complete') {
        const callback = args.length >= 1 ? args[-1 + args.length] : null

        if (typeof callback === 'function') {
          callback()
        }
      }
    })
  }

  function useValue(value) {
    if (value instanceof Array) {
      value = value.map(function (currentValue) {
        return useValue(currentValue)
      })
    } else if (value instanceof Object) {
      for (const key in value) {
        value[key] = useValue(value[key])
      }
    } else if (typeof value === 'function') {
      value = useFunction(value)
    }

    return value
  }

  function useFunction($function) {
    return function () {
      return $function.apply(this, arguments)
    }
  }

  function __w(object, property, value = null) {
    if (!('object' === typeof object && !!object)) {
      throw new TypeError('context object must to be a valid object')
    }

    if (typeof 'str' === typeof property) {
      object[property] = useValue(value)
    } else if (property instanceof Object) {
      for (const key in property) {
        object[key] = useValue(property[key])
      }
    }
  }

  function camel(str) {
    return str.charAt(0).toUpperCase() + str.slice(1, str.length)
  }

  const ComposerGradient = {
    show: function (contentElement) {
      const areaComposerGradient = document.querySelector('.areaComposerGradient')

      if (areaComposerGradient && contentElement instanceof HTMLElement) {
        areaComposerGradient.appendChild(contentElement)

        areaComposerGradient.setAttribute('show', 'show')
      }
    }
  }

  /**
   * 
   * @param ImageViewerProps props
   * 
   * {
   *   image:     HTMLImageElement
   *   imageList: HTMLImageElement[]
   * } 
   */
  function createImageViewer(props) {

    const photoViewerRef = {}
    const photoViewerListRef = {}
    const controlLeftElementContainerRef = {}
    const controlRightElementContainerRef = {}

    function resizeImageSource(image, props = {}) {
      const imageSource = new URL(image.src)

      imageSource.searchParams.set('width', props.width)
      imageSource.searchParams.set('height', props.height)
      imageSource.searchParams.set('view', 'normal')

      image.src = imageSource.toString()
    }

    function navigate(number) {
      const dataCurrentImageIndex = photoViewerRef.current.getAttribute('data-current-image-index')
      const currentImageIndex = Number(!isNaN(dataCurrentImageIndex) && dataCurrentImageIndex || 0)
      const selectedImageIndex = currentImageIndex + number

      navigateTo(selectedImageIndex)
    }

    function navigateTo(imageIndex) {
      const targetImageElementQuery = 'li div img[data-index="' + imageIndex + '"]'

      const selectedImages = photoViewerListRef.current.querySelectorAll('li div img.selected')
      const targetImageElement = photoViewerListRef.current.querySelector(targetImageElementQuery)

      if (imageIndex <= 0) {
        controlLeftElementContainerRef.current.innerHTML = ''
      } else {
        controlLeftElementContainerRef.current.appendChild(controlLeftElement)
      }

      if (!(imageIndex + 1 < props.imageList.length)) {
        controlRightElementContainerRef.current.innerHTML = ''
      } else {
        controlRightElementContainerRef.current.appendChild(controlRightElement)
      }

      if (imageIndex >= 0 && imageIndex < props.imageList.length) {
        Array.from(selectedImages).forEach(function (selectedImage) {
          selectedImage.classList.remove('selected')
        })

        if (targetImageElement) {
          targetImageElement.classList.add('selected')
        }

        photoViewerRef.current.setAttribute('data-current-image-index', imageIndex)

        const targetImageElementClone = targetImageElement.cloneNode()

        resizeImageSource(targetImageElementClone, {
          width: mainImageWidth,
          height: mainImageHeight
        })

        mainImage.src = targetImageElementClone.src
      }
    }

    const mainImage = props.image.cloneNode()

    const mainImageIndex = props.imageList.indexOf(props.image)
    const mainImageWidth = 540
    const mainImageHeight = 540

    const imageStyles = 'width: ' + mainImageWidth + 'px; height: ' + mainImageHeight + 'px'

    // const mainImageSource = new URL(mainImage.src)

    mainImage.adjustSizes({
      width: mainImageWidth,
      height: mainImageHeight
    })

    resizeImageSource(mainImage, {
      width: mainImageWidth,
      height: mainImageHeight
    })

    const windowEventHandlers = {
      keyDownHandler: useFunction(function keyDownHandler(event) {
        switch (event.keyCode) {
          case keyCodes.RIGHT:
            navigate(1)
            break;
          case keyCodes.LEFT:
            navigate(-1)
            break;
        }
      })
    }

    Object.keys(windowEventHandlers).forEach(function (handlerName) {
      const eventName = handlerName.replace(/Handler$/i, '').toLowerCase()
      const eventHandler = windowEventHandlers[handlerName]

      if ('function' === typeof eventHandler) {
        window.addEventListener(eventName, eventHandler, true)
      }
    })

    window.pageModalCloseHandler = function () {
      Object.keys(windowEventHandlers).forEach(function (handlerName) {
        const eventName = handlerName.replace(/Handler$/i, '').toLowerCase()
        const eventHandler = windowEventHandlers[handlerName]

        if ('function' === typeof eventHandler) {
          window.removeEventListener(eventName, eventHandler, true)
        }
      })
    }

    const controlLeftElement = createElement('img', {
      'src': appConfig.rootPath + 'https/im/arrow-left.svg',
      'onClick': function () {
        navigate(-1)
      }
    })

    const controlRightElement = createElement('img', {
      'src': appConfig.rootPath + 'https/im/arrow-right.svg',
      'onClick': function () {
        navigate(1)
      }
    })

    // <div class="photo-viewer-container">
    //   <div class="photo-viewer-body">
    //     <div class="photo-viewer-control photo-viewer-control-left">
    //       <svg height="40px" width="40px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 34.075 34.075" xml:space="preserve" fill="#ffffff" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.6815000000000001"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path style="fill:#ffffff;" d="M24.57,34.075c-0.505,0-1.011-0.191-1.396-0.577L8.11,18.432c-0.771-0.771-0.771-2.019,0-2.79 L23.174,0.578c0.771-0.771,2.02-0.771,2.791,0s0.771,2.02,0,2.79l-13.67,13.669l13.67,13.669c0.771,0.771,0.771,2.021,0,2.792 C25.58,33.883,25.075,34.075,24.57,34.075z"></path> </g> </g> </g></svg>
    //     </div>
    //     <div class="photo-viewer-control photo-viewer-control-right">
    //       <svg height="40px" width="40px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 34.075 34.075" xml:space="preserve" fill="#ffffff" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.6815000000000001"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path style="fill:#ffffff;" d="M24.57,34.075c-0.505,0-1.011-0.191-1.396-0.577L8.11,18.432c-0.771-0.771-0.771-2.019,0-2.79 L23.174,0.578c0.771-0.771,2.02-0.771,2.791,0s0.771,2.02,0,2.79l-13.67,13.669l13.67,13.669c0.771,0.771,0.771,2.021,0,2.792 C25.58,33.883,25.075,34.075,24.57,34.075z"></path> </g> </g> </g></svg>
    //     </div>
    //     <div class="photo-viewer-content">
    //       <div>
    //         <img src="http://localhost/blog/https/img/-net/yz/i.php?ref_type=ImVwr&src=http%3A%2F%2Flocalhost%2Fblog%2Fhttps%2Fimg%2F-net%2Fyz%2F100000004720224919701053122411.jpg&width=450&height=450&ref=non-XU&refid=U" alt="photo" />
    //       </div>
    //     </div>
    //   </div>
    //   <div class="photo-viewer-footer">
    //     <ul class="photo-viewer-list">
    //       <li class="photo-viewer-list-item">
    //         <div>
    //           <img src="http://localhost/blog/https/img/-net/yz/i.php?ref_type=ImVwr&src=http%3A%2F%2Flocalhost%2Fblog%2Fhttps%2Fimg%2F-net%2Fyz%2F100000004720224919701053122411.jpg&width=39&height=39&ref=non-XU&refid=U" alt="Photo x" />
    //         </div>
    //       </li>
    //       <li class="photo-viewer-list-item">
    //         <div>
    //           <img src="http://localhost/blog/https/img/-net/yz/i.php?ref_type=ImVwr&src=http%3A%2F%2Flocalhost%2Fblog%2Fhttps%2Fimg%2F-net%2Fyz%2F100000004720224919701053122411.jpg&width=39&height=39&ref=non-XU&refid=U" alt="Photo x" />
    //         </div>
    //       </li>
    //       <li class="photo-viewer-list-item">
    //         <div>
    //           <img src="http://localhost/blog/https/img/-net/yz/i.php?ref_type=ImVwr&src=http%3A%2F%2Flocalhost%2Fblog%2Fhttps%2Fimg%2F-net%2Fyz%2F100000004720224919701053122411.jpg&width=39&height=39&ref=non-XU&refid=U" alt="Photo x" />
    //         </div>
    //       </li>
    //       <li class="photo-viewer-list-item">
    //         <div>
    //           <img src="http://localhost/blog/https/img/-net/yz/i.php?ref_type=ImVwr&src=http%3A%2F%2Flocalhost%2Fblog%2Fhttps%2Fimg%2F-net%2Fyz%2F100000004720224919701053122411.jpg&width=39&height=39&ref=non-XU&refid=U" alt="Photo x" />
    //         </div>
    //       </li>
    //       <li class="photo-viewer-list-item">
    //         <div>
    //           <img src="http://localhost/blog/https/img/-net/yz/i.php?ref_type=ImVwr&src=http%3A%2F%2Flocalhost%2Fblog%2Fhttps%2Fimg%2F-net%2Fyz%2F100000004720224919701053122411.jpg&width=39&height=39&ref=non-XU&refid=U" alt="Photo x" />
    //         </div>
    //       </li>
    //     </ul>
    //   </div>
    // </div>

    return createElement('div', { 'class': 'photo-viewer-container', 'ref': photoViewerRef, 'data-current-image-index': mainImageIndex },
      createElement('div', { 'class': 'photo-viewer-body' },
        createElement('div', { 'class': 'photo-viewer-control photo-viewer-control-left', 'ref': controlLeftElementContainerRef },
          mainImageIndex >= 1 && controlLeftElement
        ),
        createElement('div', { 'class': 'photo-viewer-control photo-viewer-control-right', 'ref': controlRightElementContainerRef },
          mainImageIndex + 1 < props.imageList.length && controlRightElement
        ),

        createElement('div', { 'class': 'photo-viewer-content' },
          createElement('div', { style: imageStyles }, mainImage)
        )
      ),
      createElement('div', { 'class': 'photo-viewer-footer' },
        createElement('ul', { 'class': 'photo-viewer-list', 'ref': photoViewerListRef },
          props.imageList.length >= 2 && props.imageList.map(function (currentImage, currentImageIndex) {
            const currentImageClone = currentImage.cloneNode()

            const currentImageClickHandler = function () {
              const childImage = this.querySelector('img')

              if (childImage) {
                const childImageIndex = childImage.getAttribute('data-index')

                if (!isNaN(navigateTo(Number(childImageIndex)))) {
                  navigateTo(Number(childImageIndex))
                }
              }
            }

            currentImageClone.adjustSizes({
              width: 60,
              height: 60
            })

            currentImageClone.setAttribute('data-index', currentImageIndex)

            if (mainImageIndex === currentImageIndex) {
              currentImageClone.classList.add('selected')
            }

            return createElement('li', { 'class': 'photo-viewer-list-item' },
              createElement('div', {
                onClick: currentImageClickHandler
              }, currentImageClone)
            )
          })
        )
      )
    )
  }

  __d('WorkOnComposerElement', function () {
    const composerFormElement = document.querySelector('form.-cmpsr')

    const elementsEventHandlers = {
      composerFormTextFieldFocusHandler: function () {
        document.body.classList.add('areaComposerFocus')
        window.pageModalCloseHandler = elementsEventHandlers.composerFormTextFieldBlurHandler
      },

      composerFormTextFieldBlurHandler: function () {
        document.body.classList.remove('areaComposerFocus')
      },

      composerFormImageFieldChangeHandler: function (event) {
        const files = Array.from(event.target.files)

        function createImageElement(imageSource, imageAlt) {
          const imageContainer = document.createElement('div')
          const imageElement = document.createElement('img')

          imageContainer.classList.add('cmpsr-b-b-a')

          const imageProps = {
            src: imageSource,
            alt: imageAlt
          }

          Object.keys(imageProps).forEach(function (key) {
            imageElement.setAttribute(key, imageProps[key])
          })
          // imageElement.src = imageSource

          imageContainer.appendChild(imageElement)

          return imageContainer
        }

        const imagePreviewListElement = composerFormElement.querySelector('.cmpsr-b-b')

        if (imagePreviewListElement) {
          imagePreviewListElement.classList.add('show')

          files
            .filter(function (file) {
              return /^image\/.*$/i.test(file.type)
            })
            .forEach(function (file) {
              const fileReader = new FileReader()

              fileReader.readAsDataURL(file)

              fileReader.onload = function () {
                const img = createImageElement(fileReader.result, file.name)

                imagePreviewListElement.appendChild(img)
              }
            })
        }
      }
    }

    if (composerFormElement) {
      const composerFormTextField = composerFormElement.querySelector('textarea')
      const composerFormImageField = composerFormElement.querySelector('input[type="file"].composer-images-field')

      if (composerFormTextField) {
        const events = [
          ['focus', composerFormTextField, 'composerFormTextField'],
          ['change', composerFormImageField, 'composerFormImageField'],
        ]

        events.forEach(function (eventData) {
          const event = eventData[0]
          const element = eventData[1]
          const elementName = eventData[2] || 'global'

          const elementHandlerName = elementName + camel(event) + 'Handler'

          if (typeof elementsEventHandlers[elementHandlerName] === 'function') {
            element.addEventListener(event, elementsEventHandlers[elementHandlerName])
          }
        })
      }
    }
  })

  __d('WorkOnPostImages', function () {
    const postElements = document.querySelectorAll('.postagem')

    if (!postElements) {
      return
    }

    const postImageHandlers = {
      clickHandler: function () {
        const imageList = Array.from(this.parentNode.querySelectorAll('img'))

        const imageViewer = createImageViewer({
          image: this,
          imageList: imageList
        })

        ComposerGradient.show(imageViewer)
      }
    }

    function adjustImageSizes(imageElement) {
      if (imageElement.hasAttribute('square')) {
        imageElement.adjustSizes({
          height: imageElement.width
        })
      }
    }

    function _windowResizeHandler() {
      postElements.forEach(function (postElement) {
        const postImages = postElement.querySelectorAll('img')

        if (!(postImages && postImages.length >= 0)) {
          return
        }

        postImages.forEach(function (postImage) {
          adjustImageSizes(postImage)
        })
      })
    }

    window.addEventListener('resize', function () {
      _windowResizeHandler.apply(this, arguments)
    })

    postElements.forEach(function (postElement) {

      const postImages = postElement.querySelectorAll('img')

      if (!(postImages && postImages.length >= 0)) {
        return
      }

      postImages.forEach(function (postImage) {
        Object.keys(postImageHandlers).forEach(function (key) {
          const event = key.replace(/Handler$/, '')

          adjustImageSizes(postImage)

          if (typeof postImageHandlers[key] === 'function') {
            postImage.addEventListener(event, postImageHandlers[key])
          }
        })
      })

    })
  })

  __d('WorkOnModalCloseButton', function () {
    const modalCloseButton = document.querySelector('.closeButtonContainer button')
    const areaComposerGradient = document.querySelector('.areaComposerGradient')

    if (modalCloseButton) {
      modalCloseButton.addEventListener('click', function (event) {
        event.preventDefault()

        if (document.body.classList.contains('areaComposerFocus')) {
          document.body.classList.remove('areaComposerFocus')
        }

        areaComposerGradient.removeAttribute('show')

        areaComposerGradient.innerHTML = ''

        if (typeof window.pageModalCloseHandler === 'function') {
          window.pageModalCloseHandler.apply(this, arguments)

          window.pageModalCloseHandler = null
        }
      })

      window.addEventListener('keydown', function (event) {
        if (event.keyCode === keyCodes.ESC) {
          modalCloseButton.click()
        }
      })
    }
  })

  __d('WorkOnPageMainHeader', function () {
    const headerElement = document.getElementById('header')

    window.addEventListener('scroll', useFunction(function () {
      if (headerElement) {
        if (window.scrollY >= headerElement.offsetHeight + 10) {
          headerElement.classList.add('fixed')
        } else {
          headerElement.classList.remove('fixed')
        }
      }
    }))
  })

  __w(HTMLImageElement.prototype, 'adjustSizes', function (sizes) {
    const imageUrl = new URL(this.src)

    const width = sizes.width || sizes.w || undefined
    const height = sizes.height || sizes.h || undefined

    // this.style.cssText = 'height: ' + height + 'px !important; width: ' + width + 'px !important';

    if (!isNaN(width)) {
      this.style.cssText = this.style.cssText.replace(/width:\s*([0-9]+)px;?/i, '')
      this.style.cssText = 'width:' + width + 'px !important;'
    }

    if (!isNaN(height)) {
      this.style.cssText = this.style.cssText.replace(/height:\s*([0-9]+)px;?/i, '')
      this.style.cssText = 'height:' + height + 'px !important;'
    }

    // this.src = imageUrl
  })
}())
