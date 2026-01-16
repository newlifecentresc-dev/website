import React, { useState } from 'react'
import { CKEditor } from '@ckeditor/ckeditor5-react';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

const getAboutUsForm = (props) => {
    const [count, setCount] = useState(props.info);
 

    // const handleSubmit = () => {
    //     alert('An essay was submitted: ' + count);
    //     event.preventDefault();
    // }

    const handleSubmit = async event => {
        event.preventDefault();
    }
 
    return (
        <>
            <form onSubmit={handleSubmit}>
                <div className="mb-4">
                    <span className="uppercase mb-4 block text-sm text-gray-600 font-bold">about us</span>
                    <CKEditor
                        editor={ClassicEditor}
                        data={count}
                        onChange={(event, editor) => {
                            const data = editor.getData();
                            setCount(data)
                        }}
                    />
                </div>
                <input className="uppercase text-sm font-bold tracking-wide bg-indigo-500 text-gray-100 p-3 rounded-lg w-1/4 focus:outline-none focus:shadow-outline" type="submit" value="Submit" />
            </form>
        </>
    )
}

export default getAboutUsForm;