(function () {
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

  function camel(str) {
    return str.charAt(0).toUpperCase() + str.slice(1, str.length)
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
        console.log('click in a post image', this.parentNode)
      }
    }

    postElements.forEach(function (postElement) {

      const postImages = postElement.querySelectorAll('img')

      if (!(postImages && postImages.length >= 0)) {
        return
      }

      postImages.forEach(function (postImage) {
        Object.keys(postImageHandlers).forEach(function (key) {
          const event = key.replace(/Handler$/, '')

          if (typeof postImageHandlers[key] === 'function') {
            postImage.addEventListener(event, postImageHandlers[key])
          }
        })
      })

    })
  })

  __d('WorkOnModalCloseButton', function () {
    const modalCloseButton = document.querySelector('.closeButtonContainer button')

    if (modalCloseButton) {
      modalCloseButton.addEventListener('click', function (event) {
        event.preventDefault()

        if (typeof window.pageModalCloseHandler === 'function') {
          window.pageModalCloseHandler.apply(this, arguments)
        }
      })
    }
  })
}())
