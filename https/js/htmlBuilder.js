(function () {


  function _createElement(elementTagName, props = null) {
    if (!(typeof 'str' === typeof elementTagName)) {
      throw new TypeError('Element tag name must to be a string')
    }

    const element = document.createElement(elementTagName)

    const children = Array.from(arguments).slice(2, arguments.length)

    const elementPropertySetters = {
      setRef: function (ref) {
        if (ref instanceof Object) {
          ref.current = this
        } else if ('function' === typeof ref) {
          ref.apply(this, [this])
        } else if (ref instanceof Array) {
          const $this = this

          ref.forEach(function (currentRef) {
            elementPropertySetters.setRef.apply($this, [currentRef])
          })
        }
      },

      setKey: function (key) {
        this.key = key
      }
    }

    if (props instanceof Object) {
      for (const key in props) {
        const keyFirstCharToUpper = [key.charAt(0).toUpperCase(), key.slice(1)].join('')

        const propertySetter = ['set', keyFirstCharToUpper].join()

        const eventNameRe = /^on/i

        if ('function' === typeof elementPropertySetters[propertySetter]) {
          elementPropertySetters[propertySetter].apply(element, [props[key]])
        } else if (eventNameRe.test(key) && 'function' === typeof props[key]) {
          element.addEventListener(key.replace(eventNameRe, '').toLowerCase(), function () {
            return props[key].apply(this, arguments)
          })
        } else {
          element.setAttribute(key, String(props[key]))
        }
      }
    }

    function renderElementChildren(parentElement, child) {
      function isIgnorableChild(child) {
        return Boolean(
          child === null ||
          typeof child === typeof 'str' && !/\S/.test(child) ||
          typeof true === typeof child ||
          !child
        )
      }

      if (isIgnorableChild(child)) {
        return
      }

      if (child instanceof HTMLElement) {
        return parentElement.appendChild(child)
      } else if (child instanceof Array) {
        return child.forEach(function (currentChild) {
          return renderElementChildren(parentElement, currentChild)
        })
      }

      const textContent = typeof 'str' === typeof child ? child : JSON.stringify(child)

      const textElement = document.createTextNode(textContent)

      parentElement.appendChild(textElement)
    }

    children.forEach(function (child) {
      renderElementChildren(element, child)
    })
  }


  window.createElement = function () {
    return _createElement.apply(this, arguments)
  }
}())
