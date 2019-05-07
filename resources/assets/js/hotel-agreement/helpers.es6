/**
 * Get the bound box of an element
 *
 * @returns {{bottom: *, right: *, left: number, top: number, width: *, height: *}}
 * @param {Node} el
 */
export function GetElementBoundingBox(el) {
    let jElem = $(el);

    let top = jElem.offset().top - 28;
    let outerHeight = jElem.outerHeight() + (28);
    return {
        bottom: top + outerHeight,
        right: jElem.offset().left + jElem.outerWidth(),
        left: jElem.offset().left,
        top: top,
        width: jElem.outerWidth(),
        height: outerHeight
    };
}