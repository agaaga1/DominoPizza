import { forwardRef, useEffect, useRef } from 'react';

export default forwardRef(function SelectInput({ className = '', isFocused = false, options = [], onChange, ...props }, ref) {
    const input = ref || useRef();

    useEffect(() => {
        if (isFocused) {
            input.current.focus();
        }
    }, [isFocused]); // Ensure this runs again if isFocused changes

    return (
        <select
            {...props}
            className={
                'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm ' +
                className
            }
            ref={input}
            onChange={(e) => {
                const selectedValue = e.target.value; // Get the selected value
                console.log("Selected Value:", selectedValue); // Debug log
                if (onChange) {
                    onChange(selectedValue); // Call the onChange prop if provided
                }
            }}
        >
            {options.map((option, index) => (
                <option key={index} value={option}>
                    {option} {/* Adjust this if using objects: {option.label} */}
                </option>
            ))}
        </select>
    );
});
