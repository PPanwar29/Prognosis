from flask import Flask, request, render_template

import pickle

import numpy as np

#load model
model_diabetes = pickle.load(open('model_diabetes.pkl', 'rb'))
preprocessor_diabetes = pickle.load(open('preprocessor_diabetes.pkl', 'rb'))

model_heart = pickle.load(open('model_heart.pkl', 'rb'))
preprocessor_heart = pickle.load(open('preprocessor_heart.pkl', 'rb'))

app = Flask(__name__)


#diabetes model
@app.route("/diabetes")
def process_process():
    gender_value = float(request.args.get('gender_value'))
    age_value = float(request.args.get('age_value'))
    hypertension_value = float(request.args.get('hypertension_value'))
    heart_disease_value = float(request.args.get('heart_disease_value'))
    bmi_value = float(request.args.get('bmi_value'))
    HbA1c_level_value = float(request.args.get('HbA1c_level_value'))
    blood_glucose_level_value = float(request.args.get('blood_glucose_level_value'))
    smoking_history = request.args.get('smoking_history')
    features = np.array([[gender_value,age_value,hypertension_value,heart_disease_value,smoking_history,bmi_value,HbA1c_level_value,blood_glucose_level_value]],
                            dtype=object)
    transformed_features = preprocessor_diabetes.transform(features)
    result = model_diabetes.predict(transformed_features).reshape(1, -1)
    return str(result[0])
    

    
if __name__ == '__main__':
    app.run(debug=True)
