import React from "react";
import { InputsCom } from "./InputsCom";
export const FormCom = ({inputs}) =>{
    return <form>
        {
            inputs && inputs.map((input,index)=>( //si le dieron un valor al input que se ejecute
                <div key={index}>
                    <InputsCom required={input.required} label={input.label} type={input.type}></InputsCom>    
                </div>
            ))

        }

    </form>
}