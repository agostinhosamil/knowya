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

    function navigate(number) {
      console.log(number)
    }

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

    return createElement('div', { 'class': 'photo-viewer-container', 'ref': photoViewerRef },
      createElement('div', { 'class': 'photo-viewer-body' },
        createElement('div', { 'class': 'photo-viewer-control photo-viewer-control-left' },
          createElement('img', {
            'src': appConfig.rootPath + 'https/im/arrow-left.svg',
            'onClick': function () {
              navigate(-1)
            }
          })
        ),
        createElement('div', { 'class': 'photo-viewer-control photo-viewer-control-right' },
          createElement('img', {
            'src': appConfig.rootPath + 'https/im/arrow-right.svg',
            'onClick': function () {
              navigate(1)
            }
          })
        ),

        createElement('div', { 'class': 'photo-viewer-content' },
          createElement('div', null, props.image)
        )
      ),
      createElement('div', { 'class': 'photo-viewer-footer' })
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
    const areaComposerGradient = document.querySelector('.areaComposerGradient')

    if (modalCloseButton) {
      modalCloseButton.addEventListener('click', function (event) {
        event.preventDefault()

        if (document.body.classList.contains('areaComposerFocus')) {
          document.classList.remove('areaComposerFocus')
        }

        areaComposerGradient.removeAttribute('show')

        areaComposerGradient.innerHTML = ''

        if (typeof window.pageModalCloseHandler === 'function') {
          window.pageModalCloseHandler.apply(this, arguments)
        }
      })
    }
  })
}())
