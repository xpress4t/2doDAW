import React from "react";
import {CustomImputs}

export const CustomForm = ({inputs}) => {

    return <form>
        {inputs && inputs.map((input, index) => {
            <div key={index}>
                <CustomImputs input = {input}></CustomImputs>
            </div>    
        )}
    </form>
}