import numpy as np
from flask import Flask, request, render_template
import pickle

app = Flask(__name__)
model = pickle.load(open('demand.pkl', 'rb'))

@app.route('/')
def home():
    return render_template('demand.html')

@app.route('/predict', methods=['POST'])
def predict():
    int_features = [float(x) for x in request.form.values()]
    final_features = [np.array(int_features)]
    prediction = model.predict(final_features)

    output = round(prediction[0], 2)

    return render_template('result.html', prediction_text="{}".format(output))


if __name__ == "__main__":
    app.run(debug=True)
